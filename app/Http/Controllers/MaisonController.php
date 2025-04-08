<?php

namespace App\Http\Controllers;

use App\Models\Maison;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MaisonController extends Controller
{
    public function index()
    {
        $maisons = Maison::with('category')->get();
        return view('maisons.index', compact('maisons'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('maisons.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|max:2048'
        ]);

        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = Carbon::now()->format('Ymd_His') . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/maisons', $filename);
                $imagePaths[] = Storage::url($path);
            }
        }

        Maison::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'images' => $imagePaths
        ]);

        return redirect()->route('maisons.index')->with('success', 'Maison ajoutée.');
    }

    public function show(Maison $maison)
    {
        return view('maisons.show', compact('maison'));
    }

    public function edit(Maison $maison)
    {
        $categories = Category::all();
        return view('maisons.edit', compact('maison', 'categories'));
    }

    public function update(Request $request, Maison $maison)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|max:2048'
        ]);

        $imagePaths = $maison->images ?? [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = Carbon::now()->format('Ymd_His') . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/maisons', $filename);
                $imagePaths[] = Storage::url($path);
            }
        }

        $maison->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'images' => $imagePaths
        ]);

        return redirect()->route('maisons.index')->with('success', 'Maison mise à jour.');
    }

    public function destroy(Maison $maison)
    {
        $maison->delete();
        return redirect()->route('maisons.index')->with('success', 'Maison supprimée.');
    }
}

