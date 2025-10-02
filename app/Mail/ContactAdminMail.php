<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class ContactAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;

    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }

    public function build()
    {
        return $this->subject('📧 Nouveau message de contact - ' . $this->contactData['subject'])
                    ->view('mail.contact_admin')
                    ->with(['data' => $this->contactData]);
    }
}
