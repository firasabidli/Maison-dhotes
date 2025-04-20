<?php

namespace App\Http\Controllers;
use App\Models\Maison;
use App\Models\Reservation;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProprietaireController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        // maisons les plus demandée
        $maisonsPopulaire = Maison::where('user_id', Auth::id())
                         ->where('nb_demande', '>', 0)
                         ->orderByDesc('nb_demande')
                         ->get();

     $maisons = Maison::where('user_id', Auth::id())->get();
     $categories = Category::all();
    // Récupérer toutes les réservations liées à ces maisons
    $maisonIds = $maisons->pluck('id');
    $reservations = Reservation::whereIn('maison_id', $maisonIds)
                               ->with(['maison', 'client'])
                               ->get();
        return view('proprietaire.dashboard', compact('maisonsPopulaire', 'reservations', 'maisons', 'categories'));
        
    }

    // public function page2()
    // {
    //     return view('proprietaire.page2');
    // }
}
