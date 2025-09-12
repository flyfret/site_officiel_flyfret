<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'num_cli';
    protected $fillable = [
        'nom_cli',
        'prenom_cli',
        'contact_cli',
        'Email_cli',
        'pwd_cli',
        'Id_admin',
    ];
}
