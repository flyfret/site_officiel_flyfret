<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Destinataire;

class Expediteur extends Model
{
    use HasFactory;

    protected $table = 'expediteurs';
    
    protected $fillable = [
        'num_cli', 
        'nom_expediteur',
        'adresse_expediteur',
        
    ];

    // Relation avec Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'num_cli', 'num_cli');
    }

    // Relation avec Destinataire
    public function destinataire()
    {
        return $this->belongsTo(Destinataire::class);
    }

    public function detailsColis()
    {
        return $this->hasMany(DetailsColis::class);
    }
    
    public function routeNotificationForMail($notification)
    {
        // Retourner l'email du client associé
        return $this->client->Email_cli ?? null;
    }
}