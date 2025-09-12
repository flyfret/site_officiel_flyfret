<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\DetailsColis;

class StatutColisChange extends Notification implements ShouldQueue
{
    use Queueable;

    public $colis;
    public $ancienStatut;
    public $nouveauStatut;

    /**
     * Create a new notification instance.
     *
     * @param DetailsColis $colis
     * @param string $ancienStatut
     * @param string $nouveauStatut
     * @return void
     */
    public function __construct(DetailsColis $colis, $ancienStatut, $nouveauStatut)
    {
        $this->colis = $colis;
        $this->ancienStatut = $ancienStatut;
        $this->nouveauStatut = $nouveauStatut;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Mise à jour du statut de votre colis ' . $this->colis->num_details_colis)
            ->greeting('Bonjour ' . $notifiable->prenom_cli . ' ' . $notifiable->nom_cli . ',')
            ->line('Le statut de votre colis a été modifié.')
            ->line('**Numéro de colis:** ' . $this->colis->num_details_colis)
            ->line('**Ancien statut:** ' . $this->getStatutFormatted($this->ancienStatut))
            ->line('**Nouveau statut:** ' . $this->getStatutFormatted($this->nouveauStatut))
            ->action('Suivre mon colis', url('/suivi-colis/' . $this->colis->num_details_colis))
            ->line('Merci de votre confiance!')
            ->salutation('Cordialement,<br>L\'équipe Flyfret');
    }

    /**
     * Formater le statut pour l'affichage
     *
     * @param string $statut
     * @return string
     */
    private function getStatutFormatted($statut)
    {
        $statuts = [
            'en attente' => 'En attente',
            'en cours' => 'En cours de traitement',
            'expédié' => 'Expédié',
            'en transit' => 'En transit',
            'livré' => 'Livré',
            'retourné' => 'Retourné',
            'annulé' => 'Annulé',
            'En attente' => 'En attente',
            'En cours' => 'En cours',
            'Arrive' => 'Arrivé',
            'Disponible' => 'Disponible'
        ];

        return $statuts[$statut] ?? $statut;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'colis_id' => $this->colis->num_details_colis,
            'ancien_statut' => $this->ancienStatut,
            'nouveau_statut' => $this->nouveauStatut,
            'message' => 'Le statut de votre colis a été modifié de ' . $this->ancienStatut . ' à ' . $this->nouveauStatut
        ];
    }
}