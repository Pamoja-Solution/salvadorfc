<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'historique',
        "post_jouer_id"];
    public function imageUrl()
{
    // Vérifie si l'image commence déjà par http ou https
    if (str_starts_with($this->photo, 'http')) {
        return $this->photo;
    }
    
    // Sinon, retourne l'URL avec Storage
    return Storage::disk('public')->url($this->photo);
}

public function post()
    {
        return $this->belongsTo(PostJouer::class,'post_jouer_id');
    }
}
