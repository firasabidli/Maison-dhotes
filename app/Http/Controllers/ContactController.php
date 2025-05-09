<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'userMessage' => $request->message,
        ];
        

        Mail::send('emails.contact', $data, function ($mail) use ($data) {
            $mail->to('locadar.tn@gmail.com')
                 ->subject('Nouveau message de contact : ' . $data['subject'])
                 ->replyTo($data['email']);
        });
        

        return back()->with('success', 'Votre message a été envoyé avec succès.');
    }
}

