<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as LaravelAuthenticatable;

class Administrateur extends Model implements Authenticatable
{
    use HasFactory, LaravelAuthenticatable;

    protected $table = 'administrateurs';
      // Définir la clé primaire personnalisée
      protected $primaryKey = 'Id_admin';

      // La clé primaire n'est pas auto-incrémentée
      public $incrementing = true;
    protected $fillable = ['Email_admin', 'password_admin'];

    protected $hidden = ['password_admin'];

    public function comptables()
    {
        return $this->hasMany(Comptable::class, 'Id_admin');
    }

    public function logisticiens()
    {
        return $this->hasMany(Logisticien::class, 'Id_admin');
    }
}

