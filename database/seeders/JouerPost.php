<?php

namespace Database\Seeders;

use App\Models\PostJouer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JouerPost extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            'Gardien',
            'Défenseur central',
            'Défenseur latéral',
            'Milieu défensif',
            'Milieu offensif',
            'Attaquant',
            'Remplaçant',
        ];

        foreach ($posts as $post) {
            PostJouer::create([
                'nom' => $post
            ]);
        }
    }
}
