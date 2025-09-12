<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\DetailsColis;

class ColisDeposeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $colis;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(DetailsColis $colis)
    {
        $this->colis = $colis;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Confirmation de dépôt de colis - ' . $this->colis->num_details_colis)
                    ->line('Votre colis a été déposé avec succès.')
                    ->line('Numéro de colis: ' . $this->colis->num_details_colis)
                    ->line('Type: ' . $this->colis->type_colis)
                    ->line('Quantité: ' . $this->colis->quantite)
                    ->line('Vous pouvez suivre l\'état de votre colis avec ce numéro.')
                    ->line('Merci de votre confiance!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}