<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PasswordResetCode;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function step1(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Adresse e-mail introuvable.');
        }

        $code = rand(100000, 999999);

        // Supprimer les anciens codes pour cet email
        PasswordResetCode::where('email', $request->email)->delete();

        PasswordResetCode::create([
            'email' => $request->email,
            'code' => $code,
            'created_at' => now()
        ]);

        Session::put('email', $request->email);
        Session::put('step', 'code');

        Mail::send('emails.code', [
            'name' => $user->name,
            'code' => $code
        ], function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Code de réinitialisation');
        });
        

        return back();
    }

    public function step2(Request $request)
{
    $request->validate(['code' => 'required']);

    $record = PasswordResetCode::where('email', Session::get('email'))
        ->where('code', $request->code)
        ->first();

    if (!$record) {
        return back()->withErrors(['code' => 'Code incorrect.']);
    }

    // Vérifie si le code a expiré (ex: 15 minutes)
    if (now()->diffInMinutes($record->created_at) > 15) {
        $record->delete();
        return back()->withErrors(['code' => 'Code expiré.']);
    }

    Session::put('step', 'reset');
    return back();
}


    public function step3(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::where('email', Session::get('email'))->first();
        if (!$user) {
            return back()->with('error', 'Utilisateur introuvable.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Supprimer les codes
        PasswordResetCode::where('email', Session::get('email'))->delete();
        Session::forget(['step', 'email']);

        return redirect()->route('login')->with('status', 'Mot de passe réinitialisé avec succès.');
    }
}
