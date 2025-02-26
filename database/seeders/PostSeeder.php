<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run()
    {
        // Récupérer tous les utilisateurs et catégories existants
        $users = User::all();
        $categories = Categorie::all();

        // Générer 50 posts
        for ($i = 0; $i < 150; $i++) {
            $title = "gfyurfre " . ($i + 12*2);
            $slug = Str::slug($title);

            Post::create([
                'titre' => $title,
                'slug' => $slug,
                'contenus' => $this->generateFakeContent(),
                'temps' => rand(5, 60), // Temps de lecture entre 5 et 60 minutes
                'categorie_id' => $categories->random()->id,
                'user_id' => $users->random()->id,
                'status' => (bool) rand(0, 1), // Statut aléatoire (true ou false)
            ]);
        }
    }

    /**
     * Génère un contenu aléatoire avec Faker.
     */
    private function generateFakeContent()
    {
        $faker = \Faker\Factory::create();
        return $faker->paragraphs(rand(3, 6), true); // Entre 3 et 6 paragraphes
    }

    /**
     * Retourne une URL d'image aléatoire pour les posts.
     */
    private function getRandomImageUrl()
    {
        $images = [
            'https://via.placeholder.com/800x400.png?text=Image+1',
            'https://via.placeholder.com/800x400.png?text=Image+2',
            'https://via.placeholder.com/800x400.png?text=Image+3',
            'https://via.placeholder.com/800x400.png?text=Image+4',
            'https://via.placeholder.com/800x400.png?text=Image+5',
        ];

        return $images[array_rand($images)];
    }
}