<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Maison;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'maison_id' => 'required|exists:maisons,id',
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
            'nombre_personnes' => 'required|integer|min:1',
        ]);
    
        // Vérifier s’il y a un chevauchement de réservation
        $conflict = Reservation::where('maison_id', $request->maison_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('date_debut', [$request->date_debut, $request->date_fin])
                      ->orWhereBetween('date_fin', [$request->date_debut, $request->date_fin])
                      ->orWhere(function ($q) use ($request) {
                          $q->where('date_debut', '<=', $request->date_debut)
                            ->where('date_fin', '>=', $request->date_fin);
                      });
            })
            ->exists();
    
        if ($conflict) {
            return redirect()->back()->withErrors(['date_debut' => 'Cette maison est déjà réservée pour les dates sélectionnées.']);
        }
    
        // Aucune réservation conflictuelle → on crée
        Reservation::create([
            'maison_id' => $request->maison_id,
            'client_id' => Auth::id(),
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'nombre_personnes' => $request->nombre_personnes,
            'statut' => 'en attente',
        ]);
    
        return redirect()->back()->with('success', 'Réservation envoyée avec succès.');
    }  
    public function suivieDemande()
    {
       

        $reservations = Reservation::where('client_id', Auth::id())->get();
        $maisons = Maison::whereIn('id', $reservations->pluck('maison_id'))->get();
        $noms = Maison::select('id', 'nom')->distinct()->get();
   

            $totals = [];

        foreach ($reservations as $reservation) {
            $maison = $maisons->where('id', $reservation->maison_id)->first();
            if ($maison) {
                $dateDebut = \Carbon\Carbon::parse($reservation->date_debut);
                $dateFin = \Carbon\Carbon::parse($reservation->date_fin);
                $nbJours = abs($dateFin->diffInDays($dateDebut, false));
                $totals[$reservation->id] = $nbJours * $maison->prix_par_nuit;
            }
        }
        return view('client.reservation-maisons', compact('reservations', 'maisons', 'noms', 'totals'));
    }
    public function updateRes(Request $request, $id)
    {
      
        $res = Reservation::findOrFail($id);
        if($res->statut=='confirmée'){
            return redirect()->back()->withErrors('Vous ne pouvez pas modifier cette réservation. Veuillez contacter le propriétaire. ');
           }
        $request->validate([
            'date_debut'       => 'required|date',
            'date_fin'         => 'required|date|after_or_equal:date_debut',
            'nombre_personnes' => 'required|integer|min:1|max:'.$res->maison->capacite,
            'statut'           => 'required|in:en attente,annulée',
        ]);

        $res->update($request->only([
            'date_debut','date_fin','nombre_personnes','statut'
        ]));
       
        return redirect()->route('reservation.suivieDemande')->with('success','Réservation mise à jour.');
    }

    public function reservationsMaisons()
{
    $userId = Auth::id();

    // Récupérer toutes les maisons de l'utilisateur connecté
    $maisons = Maison::where('user_id', $userId)->get();

    // Récupérer toutes les réservations liées à ces maisons
    $maisonIds = $maisons->pluck('id');
    $reservations = Reservation::whereIn('maison_id', $maisonIds)
                               ->with(['maison', 'client'])
                               ->paginate(4);

    $totals = [];

    foreach ($reservations as $reservation) {
        $maison = $maisons->where('id', $reservation->maison_id)->first();
        if ($maison) {
            $dateDebut = \Carbon\Carbon::parse($reservation->date_debut);
            $dateFin = \Carbon\Carbon::parse($reservation->date_fin);
            $nbJours = abs($dateFin->diffInDays($dateDebut, false));
            $totals[$reservation->id] = $nbJours * $maison->prix_par_nuit;
        }
    }

    return view('proprietaire.gerer-reservation', compact('reservations', 'totals'));
}


    public function gestionReservation(Request $request, $id)
    {
       
        $res = Reservation::findOrFail($id);
        $maison = Maison::findOrFail($res->maison->id);

        // Vérifier si l'utilisateur connecté est bien le propriétaire de la maison
        if ($res->maison->user_id !== Auth::id()) {
            abort(403, 'Accès refusé. Vous n\'êtes pas autorisé à modifier cette réservation.');
        }
    
        $request->validate([
            'statut' => 'required|in:en attente,confirmée,annulée,refusée',
        ]);
    
        $res->update([
            'statut' => $request->statut,
        ]);
        
       
        return redirect()->route('reservation.reservationsMaisons')->with('success','Statut mise à jour.');
    }

    public function paiement(Request $request, $id)
    {
       
        $res = Reservation::findOrFail($id);

        // Vérifier si l'utilisateur connecté est bien le propriétaire de la maison
        if ($res->maison->user_id !== Auth::id()) {
            abort(403, 'Accès refusé. Vous n\'êtes pas autorisé à modifier cette réservation.');
        }
    
        $request->validate([
            'is_paid' => 'required|in:0,1',
        ]);
    
        $res->update([
            'is_paid' => $request->is_paid,
        ]);
       
        return redirect()->route('proprietaire.dashboard')->with('success','Paiement mise à jour.');
    }

    public function destroy($id)
    {
        try {
            $reservation = Reservation::find($id);
    
            if (!$reservation) {
                return redirect()->route('reservation.reservationsMaisons')->with('error', 'Réservation introuvable.');
            }
    
            $reservation->delete();
    
            return redirect()->route('reservation.reservationsMaisons')->with('success', 'Réservation supprimée.');
        } catch (\Exception $e) {
            return redirect()->route('reservation.reservationsMaisons')->with('error', 'Erreur lors de la suppression de la Réservation.');
        }
    }
}
