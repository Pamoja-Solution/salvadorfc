<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JouersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('jouers')->insert([
                'nom' => $faker->name,
                'nationnalite' => $faker->country,
                'date_de_naissance' => $faker->date($format = 'Y-m-d', $max = '2005-01-01'),
                'taille' => $faker->numberBetween(160, 200),
                'poids' => $faker->numberBetween(60, 100),
                'dorsale' => $faker->numberBetween(1, 99),
                'but' => $faker->numberBetween(0, 500),
                'passe' => $faker->numberBetween(0, 300),
                'matches' => $faker->numberBetween(0, 1000),
                'historique' => $faker->text(1200),
                'poste' => $faker->randomElement(['Attaquant', 'Milieu', 'Défenseur', 'Gardien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}