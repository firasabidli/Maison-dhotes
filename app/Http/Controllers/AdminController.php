<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Maison;
use App\Models\Avis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
          // maisons les plus demandée
            $maisonsPopulaire = Maison::where('nb_demande', '>', 0)
            ->orderByDesc('nb_demande')
            ->get();

            $maisons = Maison::all();
            $categories = Category::all();
            $users = User::where('role', '!=', 'admin')->get();
            $usersP = User::where('role', '=', 'propriétaire')->get();
            $usersC = User::where('role', '=', 'client')->get();
           
        return view('admin.dashboard', compact('maisonsPopulaire', 'maisons', 'categories', 'users', 'usersP', 'usersC'));
    }

    //  Crud Maison

    public function maisonsIndex()
    {
        $maisons = Maison::with('categorie')
                        ->paginate(4); 
    
        return view('admin.maisons', compact('maisons'));
    }
    
    public function maisonsStore(Request $request)
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

        return redirect()->route('admin.maisonsIndex')->with('success', 'Maison ajoutée avec succès.');
    }

    
    public function maisonsUpdate(Request $request, $id)
    {
        $maison = Maison::findOrFail($id);
    
        
    
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
    
        // Supprimer les anciennes images
        if ($maison->images) {
            foreach ($maison->images as $image) {
                Storage::delete('public/maisons/' . $image);
            }
        }
    
        $imagePaths = [];
    
        // Ajouter les nouvelles images
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
    
        return redirect()->route('admin.maisonsIndex')->with('success', 'Maison mise à jour.');
    }
    

    public function maisonsDestroy($id)
    {
        $maison = Maison::findOrFail($id);
    
        
    
        // Supprimer les images du disque
        if ($maison->images) {
            foreach ($maison->images as $image) {
                Storage::delete('public/maisons/' . $image);
            }
        }
    
        $maison->delete();
    
        return redirect()->route('admin.maisonsIndex')->with('success', 'Maison supprimée.');
    }

    // CRUD Category
     // Afficher tous les catégories

     public function categoryIndex()
     {
         $categories = Category::paginate(4);
         return view('admin.categories', compact('categories'));
     }
 
    
     // Enregistrer une catégories dans la base de donnée
 
     public function categoryStore(Request $request)
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
             return redirect()->route('admin.categoryIndex')->with('success', 'Catégorie ajoutée avec succès.');
         } catch (\Exception $e) {
             // Gestion des erreurs : redirection avec message d'erreur
             return redirect()->route('admin.categoryIndex')->with('error', 'Une erreur est survenue lors de l\'ajout de la catégorie.');
         }
     }
 
 
     // Modifier une catégorie 
 
     public function categoryUpdate(Request $request, $id)
     {
         $validator = Validator::make($request->all(), [
             'nom' => 'required|string|max:255'
         ]);
     
         if ($validator->fails()) {
             return redirect()->route('admin.categoryIndex')
                 ->withErrors($validator)
                 ->withInput()
                 ->with('open_modal', 'modal-edit-' . $id);
         }
     
         $category = Category::find($id);
     
         if (!$category) {
             return redirect()->route('admin.categoryIndex')->with('error', 'Catégorie introuvable.');
         }
     
         $category->update([
             'nom' => $request->nom
         ]);
     
         return redirect()->route('admin.categoryIndex')->with('success', 'Catégorie mise à jour.');
     }
     
 
     // Supprimer une catégorie
 
     public function destroy($id)
     {
         try {
             $category = Category::find($id);
     
             if (!$category) {
                 return redirect()->route('admin.categoryIndex')->with('error', 'Catégorie introuvable.');
             }
     
             $category->delete();
     
             return redirect()->route('admin.categoryIndex')->with('success', 'Catégorie supprimée.');
         } catch (\Exception $e) {
             return redirect()->route('admin.categoryIndex')->with('error', 'Erreur lors de la suppression de la catégorie.');
         }
     }

    // Gestion AVIS
    public function avisIndex()
    {
        $maisons = Maison::all(); 
        $maisonIds = $maisons->pluck('id');
        $avis = Avis::whereIn('maison_id', $maisonIds)->paginate(4);
        return view('admin.controle-avis', compact('avis'));
    }
    

    public function avisDestroy($id)
    {
        try {
            $avis = Avis::find($id);
    
            if (!$avis) {
                return redirect()->route('admin.avisIndex')->with('error', 'Avis introuvable.');
            }
    
            $avis->delete();
    
            return redirect()->route('admin.avisIndex')->with('success', 'avis supprimée.');
        } catch (\Exception $e) {
            return redirect()->route('admin.avisIndex')->with('error', "Erreur lors de la suppression de l'avis.");
        }
    }

    //  Gestion Utilisateurs

    public function usersIndex()
    {
        $users = User::where('role', '!=', 'admin')->get();
                         
    
        return view('admin.gestion-utilisateurs', compact('users'));
    }
    
    public function addUser(Request $request)
    {
        if (!Str::startsWith($request->num_tel, '+216')) {
            $request->merge([
                'num_tel' => '+216' . preg_replace('/\s+/', '', $request->num_tel)
            ]);
        }
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                'min:6',
                'regex:/[A-Z]/', // Majuscule
                'regex:/[0-9]/'  // Chiffre
            ],
            'role' => ['required', 'in:client,propriétaire'],
            'avatar' => ['nullable', 'image', 'max:2048'], // avatar est optionnel
            'num_tel' => ['required', 'regex:/^\+216[0-9]{8}$/', 'unique:users,num_tel'],
            'adresse' => ['required', 'string', 'min:3', 'max:255'],
        ], [
            'name.min' => "Le nom doit contenir au moins 3 caractères.",
            'email.email' => "Veuillez entrer une adresse e-mail valide.",
            'email.unique' => "Cette adresse e-mail est déjà utilisée.",
            'password.min' => "Le mot de passe doit contenir au moins 6 caractères.",
            'password.regex' => "Le mot de passe doit contenir au moins une majuscule et un chiffre.",
            'password.confirmed' => "Les mots de passe ne correspondent pas.",
            'role.in' => "Le rôle sélectionné est invalide.",
            'num_tel.regex' => "Le numéro de téléphone doit contenir exactement 8 chiffres.",
            'name.min' => "L'adresse doit contenir au moins 3 caractères.",
        ]);

        // Stockage local de l'avatar si fourni
        $avatarUrl = null;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            // Générer un nom de fichier unique avec la date/heure
            $timestamp = Carbon::now()->format('Ymd_His');
            $extension = $file->getClientOriginalExtension();
            $filename = $timestamp . '_' . uniqid() . '.' . $extension;

            // Stocker l'image dans storage/app/public/avatars
            $path = $file->storeAs('public/avatars', $filename);

            // Obtenir l'URL publique via le lien symbolique /storage
            $avatarUrl = $filename ;
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'avatar' => $avatarUrl,
            'num_tel'=> $request->num_tel,
            'adresse'=> $request->adresse,
        ]);

        return redirect()->route('admin.usersIndex')->with('success', 'Utilisateur ajoutée avec succès.');
    }

    
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        if (!Str::startsWith($request->num_tel, '+216')) {
            $request->merge([
                'num_tel' => '+216' . preg_replace('/\s+/', '', $request->num_tel)
            ]);
        }
    
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role' => ['required', 'in:client,propriétaire'],
            'avatar' => ['nullable', 'image', 'max:2048'], // avatar est optionnel
            'num_tel' => ['required', 'regex:/^\+216[0-9]{8}$/', 'unique:users,num_tel,' . $user->id],
            'adresse' => ['required', 'string', 'min:3', 'max:255'],
        ], [
            'name.min' => "Le nom doit contenir au moins 3 caractères.",
            'email.email' => "Veuillez entrer une adresse e-mail valide.",
            'email.unique' => "Cette adresse e-mail est déjà utilisée.",
            'role.in' => "Le rôle sélectionné est invalide.",
            'num_tel.regex' => 'Le numéro doit être sous la forme +216XXXXXXXX.',
            'name.min' => "L'adresse doit contenir au moins 3 caractères.",
        ]);
    
        // Supprimer l'ancien avatar si nouveau fichier envoyé
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete('public/avatars/' . $user->avatar);
            }

            $file = $request->file('avatar');
            $timestamp = Carbon::now()->format('Ymd_His');
            $extension = $file->getClientOriginalExtension();
            $filename = $timestamp . '_' . uniqid() . '.' . $extension;
            $file->storeAs('public/avatars', $filename);
            $avatarUrl = $filename;
        } else {
            $avatarUrl = $user->avatar;
        }
    
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $avatarUrl,
            'num_tel' => $request->num_tel,
            'adresse' => $request->adresse,
            'role' => $request->role,
        ]);
    
        return redirect()->route('admin.usersIndex')->with('success', 'Utilisateur mis à jour.');
    }
    

    public function userDestroy($id)
    {
        $user = User::findOrFail($id);
    
        
    
        // Supprimer les images du disque
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete('public/avatars/' . $user->avatar);
            }
    
        $user->delete();
    
        return redirect()->route('admin.usersIndex')->with('success', 'Utilisateur supprimée.');
        }

   
    }

}