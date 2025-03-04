<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable=[
        'titre',
        'contenus',
        'image',
        'slug',
        'temps',
        'categorie_id',
        'status',
        'user_id',
    ];
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function category()
    {
        return $this->belongsTo(Categorie::class, "categorie_id");
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function imageUrl()
{
    // Vérifie si l'image commence déjà par http ou https
    if (str_starts_with($this->image, 'http')) {
        return $this->image;
    }
    
    // Sinon, retourne l'URL avec Storage
    return Storage::disk('public')->url($this->image);
}

public function comments(): HasMany
    {
        return $this->hasMany(Commentaire::class);
    }

   

    public function getRouteKeyName()
    {
        return 'slug'; // Utiliser la colonne 'slug' pour les routes
    }
    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class);
    }
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
}
