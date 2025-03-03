<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendrierMatch extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'competition',
        'journee',
        'date_match',
        'heure_match',
        'equipe_domicile',
        'equipe_exterieur',
        'stade',
        'statut',
    ];
}
