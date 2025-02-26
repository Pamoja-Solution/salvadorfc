<?php

namespace Database\Seeders;

use App\Models\Calendrier;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CalendriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Récupérer tous les IDs des types existants
        $typeIds = Type::pluck('id')->toArray();

        // Générer 20 calendriers
        foreach (range(1, 50) as $index) {
            $dateDebut = $faker->dateTimeBetween('now', '+1 year');
            $dateFin = $faker->dateTimeBetween($dateDebut, '+1 year');

            Calendrier::create([
                'titre' => $faker->sentence(3), // Génère un titre de 3 mots
                'description' => $faker->paragraph(2), // Génère une description de 2 phrases
                'date_debut' => $dateDebut,
                'date_fin' => $dateFin,
                'type_id' => $faker->randomElement($typeIds), // Sélectionne un type_id aléatoire
            ]);
        }
    }
}