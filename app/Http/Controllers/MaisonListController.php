<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maison;
use App\Models\Category;
class MaisonListController extends Controller
{
    public function maisonList(Request $request)
{
    $query = Maison::with('categorie', 'user');
    $filtre = "non";

    // Filtre par prix
    if ($request->has('prix')) {
        $priceRanges = array_filter($request->input('prix'), fn($range) => !empty($range));

        if (!empty($priceRanges)) {
            $filtre = "oui";
            $query->where(function ($query) use ($priceRanges) {
                foreach ($priceRanges as $range) {
                    if (strpos($range, '-') !== false) {
                        [$min, $max] = explode('-', $range);
                        $query->orWhereBetween('prix_par_nuit', [(int)$min, (int)$max]);
                    }
                }
            });
        }
    }

    // 🔍 Filtre par ville (si une ou plusieurs villes sont sélectionnées)
    if ($request->filled('villes')) {
        $filtre = "oui";
        $query->whereIn('ville', $request->input('villes'));
    }
    // Tri
    switch ($request->input('sort')) {
        case 'nom':
            $query->orderBy('nom', 'asc');
            break;
        case 'prix':
            $query->orderBy('prix_par_nuit', 'asc');
            break;
        case 'ville':
            $query->orderBy('ville', 'asc');
            break;
    }
    
    $maisons = $query->paginate(9);
    $noms = Maison::select('id', 'nom')->distinct()->get();
    return view('client.list-maison', [
        'maisons' => $maisons,
        'noms' => $noms,
        'prixSelected' => $request->prix ?? [],
        'villeSelected' => $request->input('villes') ?? [],
        'filtre' => $filtre
    ]);
}



    
}
