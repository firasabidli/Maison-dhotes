<?php
namespace App\Http\Controllers;
use App\Models\Maison;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MaisonController extends Controller
{
    public function index()
    {
        $maisons = Maison::where('user_id', Auth::id())
                        ->with('category')
                        ->paginate(4); 
    
        return view('proprietaire.maisons', compact('maisons'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'prix_par_nuit' => 'required|numeric',
            'capacite' => 'required|integer',
            'disponible' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|max:2048'
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = Carbon::now()->format('Ymd_His') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/maisons', $filename);
                $imagePaths[] = $filename;
            }
        }

        Maison::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'prix_par_nuit' => $request->prix_par_nuit,
            'capacite' => $request->capacite,
            'disponible' => $request->disponible,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'images' => $imagePaths
        ]);

        return redirect()->route('maisons.index')->with('success', 'Maison ajoutée avec succès.');
    }

    public function update(Request $request, $id)
    {
        $maison = Maison::findOrFail($id);

        if ($maison->user_id !== Auth::id()) {
            return back()->with('error', 'Non autorisé.');
        }

        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'prix_par_nuit' => 'required|numeric',
            'capacite' => 'required|integer',
            'disponible' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|max:2048'
        ]);

        $imagePaths = $maison->images ?? [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = Carbon::now()->format('Ymd_His') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/maisons', $filename);
                $imagePaths[] = $filename;
            }
        }

        $maison->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'prix_par_nuit' => $request->prix_par_nuit,
            'capacite' => $request->capacite,
            'disponible' => $request->disponible,
            'category_id' => $request->category_id,
            'images' => $imagePaths
        ]);

        return redirect()->route('maisons.index')->with('success', 'Maison mise à jour.');
    }

    public function destroy($id)
    {
        $maison = Maison::findOrFail($id);

        if ($maison->user_id !== Auth::id()) {
            return back()->with('error', 'Non autorisé.');
        }

        $maison->delete();

        return redirect()->route('maisons.index')->with('success', 'Maison supprimée.');
    }
}
