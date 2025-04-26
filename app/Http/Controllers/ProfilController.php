<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Maison;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function settings()
    {
        $user = Auth::user();
                        
        $noms = Maison::select('id', 'nom')->distinct()->get();
        return view('client.paramaitre', compact('user', 'noms'));
    }

    
    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user->id !== Auth::id()) {
            return back()->with('error', 'Non autorisé.');
        }
        if (!Str::startsWith($request->num_tel, '+216')) {
            $request->merge([
                'num_tel' => '+216' . preg_replace('/\s+/', '', $request->num_tel)
            ]);
        }
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'num_tel' => ['required', 'regex:/^\+216[0-9]{8}$/', 'unique:users,num_tel,' . $user->id],
            'adresse' => ['required', 'string', 'min:3', 'max:255'],
        ], [
            'name.min' => "Le nom doit contenir au moins 3 caractères.",
            'email.email' => "Veuillez entrer une adresse e-mail valide.",
            'email.unique' => "Cette adresse e-mail est déjà utilisée.",
            'num_tel.regex' => 'Le numéro doit être sous la forme +216XXXXXXXX.',
            'adresse.min' => "L'adresse doit contenir au moins 3 caractères.",
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

        // Ajout +216 à num_tel
       
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $avatarUrl,
            'num_tel' => $request->num_tel,
            'adresse' => $request->adresse,
        ]);

        return redirect()->route('profil.settings')->with('success', 'Profil mis à jour avec succès.');
    }

    

public function changePassword(Request $request, $id)
{
    $user = User::findOrFail($id);

    if ($user->id !== Auth::id()) {
        return back()->with('error', 'Action non autorisée.');
    }

    $request->validate([
        'actual_password' => ['required'],
        'new_password' => ['required', 'string', 'min:8', 'confirmed'],
    ], [
        'actual_password.required' => 'Veuillez entrer votre mot de passe actuel.',
        'new_password.required' => 'Veuillez entrer un nouveau mot de passe.',
        'new_password.min' => 'Le nouveau mot de passe doit contenir au moins 8 caractères.',
        'new_password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
    ]);

    // Vérifier que le mot de passe actuel est correct
    if (!Hash::check($request->actual_password, $user->password)) {
        return back()->with('error', 'Le mot de passe actuel est incorrect.');
    }

    // Mise à jour du mot de passe
    $user->update([
        'password' => Hash::make($request->new_password),
    ]);

    return back()->with('success', 'Mot de passe mis à jour avec succès.');
}


}

