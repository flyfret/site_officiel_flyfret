<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailsColis;
class RendezVous extends Model
{
    use HasFactory;
    protected $table = 'rendezvous';
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'date',
        'heure',
        'motif',
        'agence',
        'autre_motif'
    ];

    public function detailsColis()
    {
        return $this->belongsTo(DetailsColis::class,'detail_colis_id');
    }
}
