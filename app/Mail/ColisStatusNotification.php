<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\DetailsColis;
use App\Models\Client;

class ColisStatusNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $colis;
    public $client;
    public $role;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DetailsColis $colis, Client $client, $role)
    {
        $this->colis = $colis;
        $this->client = $client;
        $this->role = $role;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->role === 'expediteur' 
            ? 'Votre colis a été déposé - ' . $this->colis->num_details_colis
            : 'Un colis vous est destiné - ' . $this->colis->num_details_colis;

        return $this->subject($subject)
                    ->view('emails.colis_status')
                    ->with([
                        'colis' => $this->colis,
                        'client' => $this->client,
                        'role' => $this->role
                    ]);
    }
}