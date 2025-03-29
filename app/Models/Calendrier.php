<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Calendrier extends Model
{
    protected $fillable=[
        'titre',
        'description',
        'date_debut',
        'date_fin',
        'photo',
        'type_id',
        "slug"
    ];

    protected $casts = [
        'date_debut' => 'datetime',
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

public function getRouteKeyName()
    {
        return 'slug'; // Utiliser la colonne 'slug' pour les routes
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($calendrier) {
            if (!$calendrier->slug) {
                // Si le slug n'est pas défini, en générer un artificiel
                $calendrier->slug = 'calendrier-' . Str::slug($calendrier->titre) . '-' . Str::random(6);
            }
        });
    }
}
