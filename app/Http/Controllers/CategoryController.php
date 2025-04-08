<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    // Afficher tous les catégories
    
    public function index()
    {
        $categories = Category::paginate(4);
        return view('proprietaire.page2', compact('categories'));
    }

   
    // Enregistrer une catégories dans la base de donnée

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255'
        ]);

        try {
            // Création de la catégorie
            Category::create([
                'nom' => $request->nom
            ]);

            // Redirection avec succès
            return redirect()->route('category.index')->with('success', 'Catégorie ajoutée avec succès.');
        } catch (\Exception $e) {
            // Gestion des erreurs : redirection avec message d'erreur
            return redirect()->route('category.index')->with('error', 'Une erreur est survenue lors de l\'ajout de la catégorie.');
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
    
            $category->delete();
    
            return redirect()->route('category.index')->with('success', 'Catégorie supprimée.');
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('error', 'Erreur lors de la suppression de la catégorie.');
        }
    }

}


