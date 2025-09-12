<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $newPassword;

    /**
     * Créer une nouvelle instance de message.
     *
     * @param  string  $newPassword
     * @return void
     */
    public function __construct($newPassword)
    {
        $this->newPassword = $newPassword;
    }

    /**
     * Construire le message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Réinitialisation de votre mot de passe')
                    ->view('emails.resetPassword'); // Spécifiez la vue d'email ici
    }
}
