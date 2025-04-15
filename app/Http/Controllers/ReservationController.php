<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
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

        Reservation::create([
            'maison_id' => $request->maison_id,
            'client_id' => Auth::id(), // ou autre logique d'utilisateur
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'nombre_personnes' => $request->nombre_personnes,
            'statut' => 'en attente',
        ]);

        return redirect()->back()->with('success', 'Réservation envoyée avec succès.');
    }
}
