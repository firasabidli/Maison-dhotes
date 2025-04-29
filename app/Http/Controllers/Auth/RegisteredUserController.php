<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Gère l'inscription d'un nouvel utilisateur.
     */
    public function store(Request $request)
    {
        if (!Str::startsWith($request->num_tel, '+216')) {
            $request->merge([
                'num_tel' => '+216' . preg_replace('/\s+/', '', $request->num_tel)
            ]);
        }
        // Validation des champs
        $validator = \Validator::make($request->all(), [
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
            'avatar' => ['nullable', 'image'], // avatar est optionnel
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
            'num_tel.regex' => 'Le numéro doit être sous la forme +216XXXXXXXX.',
            'name.min' => "L'adresse doit contenir au moins 3 caractères.",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('register_errors', true);
        }

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

        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'avatar' => $avatarUrl,
            'num_tel'=> $request->num_tel,
            'adresse'=> $request->adresse,
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('client.home');
    }
}
