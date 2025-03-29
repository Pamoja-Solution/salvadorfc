<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendrierMatch extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'competition_id',
        'journee',
        'date_match',
        'heure_match',
        'equipe_domicile',
        'adversaire',
        'stade',
        'statut',
    ];
    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    protected $casts = [
        'date_match' => 'datetime',
        'heure_match' => 'datetime',
    ];
}
