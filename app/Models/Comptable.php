<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as LaravelAuthenticatable;

class Comptable extends Model implements Authenticatable
{
    use HasFactory, LaravelAuthenticatable;

    protected $table = 'comptables';
      // Définir la clé primaire personnalisée
      protected $primaryKey = 'num_compta';

      // La clé primaire n'est pas auto-incrémentée
      public $incrementing = true;
    protected $fillable = ['nom_compta', 'prenom_compta', 'contact_compta', 'Email_compta', 'Password_compta', 'Id_admin'];

    protected $hidden = ['Password_compta'];

    public function administrateur()
    {
        return $this->belongsTo(Administrateur::class, 'Id_admin');
    }
}

