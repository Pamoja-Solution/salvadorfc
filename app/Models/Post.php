<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
}
