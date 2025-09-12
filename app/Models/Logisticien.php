<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as LaravelAuthenticatable;
use App\Models\Administrateur;

class Logisticien extends Model implements Authenticatable
{
    use HasFactory, LaravelAuthenticatable;

    // Définition de la table associée au modèle
    protected $table = 'logisticiens';

    // Définir la clé primaire personnalisée
    protected $primaryKey = 'num_logist';

    // La clé primaire n'est pas auto-incrémentée
    public $incrementing = true;

    // Type de la clé primaire
    protected $keyType = 'int';

    // Colonnes pouvant être remplies via des formulaires ou des requêtes
    protected $fillable = [
        'nom_logist',
        'prenom_logist',
        'password_logist',
        'Email_logist',
        'contact_logist',
        'Id_admin',
    ];

    // Colonnes à masquer dans les tableaux ou réponses JSON
    protected $hidden = [
        'password_logist',
    ];

    // Définition de la relation avec le modèle Administrateur
    public function administrateur()
    {
        return $this->belongsTo(Administrateur::class, 'Id_admin');
    }
}
