<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    
     public function store(Request $request)
     {
         $validator = \Validator::make($request->all(), [
             'name' => ['required', 'string', 'min:3', 'max:255'],
             'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
             'password' => [
                 'required',
                 'confirmed',
                 'min:6',
                 'regex:/[A-Z]/', // Doit contenir une majuscule
                 'regex:/[0-9]/'  // Doit contenir un chiffre
             ],
             'role' => ['required', 'in:client,propriétaire'], // Accepte uniquement "client" ou "propriétaire"
         ], [
             'name.min' => "Le nom doit contenir au moins 3 caractères.",
             'email.email' => "Veuillez entrer une adresse e-mail valide.",
             'email.unique' => "Cette adresse e-mail est déjà utilisée. Veuillez en choisir une autre.",
             'password.min' => "Le mot de passe doit contenir au moins 6 caractères.",
             'password.regex' => "Le mot de passe doit contenir au moins une majuscule et un chiffre.",
             'password.confirmed' => "Les mots de passe ne correspondent pas. Veuillez confirmer votre mot de passe.",
             'role.in' => "Le rôle sélectionné est invalide. Veuillez choisir 'client' ou 'propriétaire'."

         ]);
            // Si la validation échoue, on retourne avec les erreurs et on ajoute register_errors à la session
         if ($validator->fails()) {
             return redirect()->back()
                 ->withErrors($validator)
                 ->withInput()
                 ->with('register_errors', true); // Ajoute ceci
                
         }
     
         // Création de l'utilisateur après validation réussie
         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
             'role' => $request->role,
         ]);
     
         event(new Registered($user));
         Auth::login($user);
     
         return redirect()->route('client.home');
     }
     


    

}
