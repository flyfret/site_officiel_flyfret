<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Client;
use App\Models\DetailsColis;

class Facture extends Model
{
    //
    protected $primaryKey = 'num_fact';
    protected $fillable = [
        'libelle_fact',
        'montant_tot_fact',
        'tva_fact',
        'statut_fact',
        'num_cli',
        'num_col',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class, 'num_cli', 'id');
    }
    
    public function detailsColis()
    {
        return $this->belongsTo(DetailsColis::class, 'num_col', 'id');
    }
}
