<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactAdminMail extends Mailable
{
    public $userEmail;

    public function __construct($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    public function build()
    {
        return $this->subject('Demande de déblocage de compte')
                    ->view('emails.contact_admin')
                    ->with(['userEmail' => $this->userEmail]);
    }
}
