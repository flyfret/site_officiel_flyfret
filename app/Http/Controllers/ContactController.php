<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        try {
            // Envoyer l'email uniquement à l'administrateur
            $adminEmail = env('MAIL_FROM_ADDRESS', 'service.client@flyfret.net');
            Mail::to($adminEmail)->send(new ContactFormMail($data));

            Log::info('Email de contact envoyé à l\'admin', [
                'from' => $data['email'],
                'to' => $adminEmail,
                'subject' => $data['subject']
            ]);

            return back()->with('success', 'Merci pour votre message. Nous vous contacterons bientôt!');

        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'envoi de l\'email de contact: ' . $e->getMessage());

            return back()->with('error', 'Votre message a été enregistré, mais une erreur est survenue lors de l\'envoi. Nous vous contacterons dès que possible.');
        }
    }
}