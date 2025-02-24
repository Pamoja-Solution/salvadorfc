<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jouer extends Model
{
    protected $fillable=[
        'nom',
        'nationnalite',
        'date_de_naissance',
        'photo',
        'taille',
        'poids',
        'dorsale',
        'but',
        'passe',
        'matches',
        'historique'];
}
