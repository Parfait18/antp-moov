<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiare extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'msisdn',
        'dob',
        'departement',
        'ville',
        'agence',
        'msisdn_moov_transafered',
    ];
}
