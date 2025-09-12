<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Expedier; 
use App\Models\Retirer;  
use App\Models\Client;

class DetailsColis extends Model
{
    use HasFactory;
    
    protected $table = 'details_colis';
    protected $primaryKey = 'num_col'; // Correction ici
    public $incrementing = true;       // Correction ici
    protected $keyType = 'int';        // Correction ici
    
    protected $fillable = [
        'num_details_colis',
        'type_colis',
        'quantite',
        'valeur_marchande',
        'status',
        'nom_lot',
        'detail_specifique',
        'expediteur_id',
        'destinataire_id',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */

    // Relation avec l'expéditeur
    public function expediteur()
    {
        return $this->belongsTo(Expediteur::class, 'expediteur_id')->with('client');
    }

    public function destinataire()
    {
        return $this->belongsTo(Destinataire::class, 'destinataire_id')->with('client');
    }

    // Relation avec l'expédition
    public function expedition()
    {
        return $this->hasOne(Expedier::class, 'num_col', 'num_col');
    }

    // Relation avec le retrait
    public function retrait()
    {
        return $this->hasOne(Retirer::class, 'num_col', 'num_col');
    }

    /**
     * Génère un numéro de suivi unique pour le colis
     *
     * @param string $villeDepart
     * @param string $villeArrivee
     * @return string
     */
    // public static function generateTrackingNumber($villeDepart, $villeArrivee)
    // {
    //     $villeDepartCode = strtoupper(substr($villeDepart, 0, 1));
    //     $villeArriveeCode = strtoupper(substr($villeArrivee, 0, 1));
    //     $randomStr = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 4);
    //     $unique = strtoupper(substr(uniqid(), -6));
        
    //     return $villeDepartCode . $villeArriveeCode . $randomStr . $unique;
    // }

    public static function generateTrackingNumber($villeDepart, $villeArrivee)
    {
        $villeDepartCode = strtoupper(substr($villeDepart, 0, 1));
        $villeArriveeCode = strtoupper(substr($villeArrivee, 0, 1));
        $randomNumbers = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $unique = strtoupper(substr(uniqid(), -6));

        return $villeDepartCode . $villeArriveeCode . $randomNumbers ;
    }
    
    /**
     * Accesseur pour obtenir le statut formaté
     *
     * @return string
     */
    public function getStatusFormattedAttribute()
    {
        $statuses = [
            'en attente' => 'En attente',
            'en cours' => 'En cours de traitement',
            'expédié' => 'Expédié',
            'en transit' => 'En transit',
            'livré' => 'Livré',
            'retourné' => 'Retourné',
            'annulé' => 'Annulé'
        ];
        
        return $statuses[$this->status] ?? $this->status;
    }
    
    /**
     * Vérifie si le colis peut être modifié
     *
     * @return bool
     */
    public function canBeModified()
    {
        return in_array($this->status, ['en attente', 'en cours']);
    }

    public function facture()
    {
        return $this->hasMany(Facture::class, 'num_col', 'num_col');
    }
}