<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    // Afficher tous les catégories

    public function index()
    {
        $categories = Category::paginate(4);
        return view('proprietaire.categories', compact('categories'));
    }

   
    // Enregistrer une catégories dans la base de donnée

   public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255'
        ]);

        try {
            Category::create([
                'nom' => $request->nom,
                'cree_par' => Auth::id(), 
            ]);

            return redirect()->route('category.index')->with('success', 'Catégorie ajoutée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('error', 'Une erreur est survenue lors de l\'ajout.');
        }
    }



    // Modifier une catégorie 

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->route('category.index')
                ->withErrors($validator)
                ->withInput()
                ->with('open_modal', 'modal-edit-' . $id);
        }

        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('category.index')->with('error', 'Catégorie introuvable.');
        }

       
        if ($category->cree_par !== Auth::id()) {
            return redirect()->route('category.index')->with('error', 'Vous n\'êtes pas autorisé à modifier cette catégorie.');
        }

        $category->update([
            'nom' => $request->nom
        ]);

        return redirect()->route('category.index')->with('success', 'Catégorie mise à jour.');
    }

    

    // Supprimer une catégorie

    public function destroy($id)
{
    try {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('category.index')->with('error', 'Catégorie introuvable.');
        }

       
        if ($category->cree_par !== Auth::id()) {
            return redirect()->route('category.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer cette catégorie.');
        }

        $category->delete();

        return redirect()->route('category.index')->with('success', 'Catégorie supprimée.');
    } catch (\Exception $e) {
        return redirect()->route('category.index')->with('error', 'Erreur lors de la suppression.');
    }
}


}


