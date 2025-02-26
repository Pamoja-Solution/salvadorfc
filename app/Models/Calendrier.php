<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Calendrier extends Model
{
    protected $fillable=[
        'titre',
        'description',
        'date_debut',
        'date_fin',
        'photo',
        'type_id',
    ];

    public function imageUrl()
{
    // Vérifie si l'image commence déjà par http ou https
    if (str_starts_with($this->photo, 'http')) {
        return $this->photo;
    }
    
    // Sinon, retourne l'URL avec Storage
    return Storage::disk('public')->url($this->photo);
}
// Dans votre modèle Calendrier
public function type()
{
    return $this->belongsTo(Type::class);
}
}
