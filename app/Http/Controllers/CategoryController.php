<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(4);
        return view('proprietaire.page2', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

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


    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        if (!$category) {
            return redirect()->route('category.index')->with('error', 'Catégorie introuvable.');
        }

        $request->validate([
            'nom' => 'required|string|max:255'
        ]);

        $category->update([
            'nom' => $request->nom
        ]);

        return redirect()->route('category.index')->with('success', 'Catégorie mise à jour.');
    }


    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Catégorie supprimée.');
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('error', 'Erreur lors de la suppression de la catégorie.');
        }
    }

}


