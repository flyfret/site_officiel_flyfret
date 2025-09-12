<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ResetPasswordMail extends Mailable
{
    public $newPassword;

    public function __construct($newPassword)
    {
        $this->newPassword = $newPassword;
    }

    public function build()
    {
        return $this->subject('Réinitialisation de votre mot de passe')
                    ->view('emails.resetPassword')
                    ->with(['newPassword' => $this->newPassword]);
    }
}
