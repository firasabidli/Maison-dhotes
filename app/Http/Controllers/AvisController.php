<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avis;
use App\Models\Maison;
use Illuminate\Support\Facades\Auth;

class AvisController extends Controller
{
    public function index()
    {
        $maisons = Maison::where('user_id', Auth::id())->get(); 
        $maisonIds = $maisons->pluck('id');
        $avis = Avis::whereIn('maison_id', $maisonIds)->paginate(4);
        return view('proprietaire.controle-avis', compact('avis'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'maison_id' => 'required|exists:maisons,id',
            'note' => 'required|integer|min:1|max:5',
            'commentaire' => 'required|string',
        ]);

        Avis::create([
            'maison_id' => $request->maison_id,
            'client_id' => Auth::id(), 
            'note' => $request->note,
            'commentaire' => $request->commentaire,
        ]);

        return back()->with('success', 'Avis ajouté avec succès.');
    }

    public function destroy($id)
    {
        try {
            $avis = Avis::find($id);
    
            if (!$avis) {
                return redirect()->route('avis.index')->with('error', 'Avis introuvable.');
            }
    
            $avis->delete();
    
            return redirect()->route('avis.index')->with('success', 'avis supprimée.');
        } catch (\Exception $e) {
            return redirect()->route('avis.index')->with('error', "Erreur lors de la suppression de l'avis.");
        }
    }

}
