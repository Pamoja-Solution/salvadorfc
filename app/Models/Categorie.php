<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Categorie extends Model
{
    use HasSlug;
    protected $fillable=[
        'name',
        'description',
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name') // Génère le slug à partir du nom
            ->saveSlugsTo('slug'); // Sauvegarde le slug dans la colonne `slug`
    }
}
