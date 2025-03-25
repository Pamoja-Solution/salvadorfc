<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostJouer extends Model
{
    
    public function joueurs()
    {
        return $this->hasMany(Jouer::class);
    }
}
