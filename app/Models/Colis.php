<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expedition;

class Colis extends Model
{
    use HasFactory;

    protected $primaryKey = 'num_colis';  // Définir la clé primaire

    protected $fillable = [
        'libelle_colis', 'poids_colis', 'statut_colis'
    ];

    public function expeditions()
    {
        return $this->hasMany(Expedition::class, 'num_colis');
    }
}
