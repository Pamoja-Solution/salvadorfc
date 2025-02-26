<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    public function run()
    {
        // Assurez-vous que le tableau est accessible (importez-le ou définissez-le ici)
        $evenements =  [
            'Match',
            'Entraînement',
            'Remise de trophée',
            'Séance photo',
            'Commémoration',
            'Cérémonie de clôture de saison',
            'Cérémonie d\'ouverture de saison',
            'Match amical',
            'Tournoi',
            'Séance de dédicaces',
            'Rencontre avec les supporters',
            'Conférence de presse',
            'Stage de formation',
            'Match de gala',
            'Événement caritatif',
            'Séance de team building',
            'Visite d\'un stade',
            'Rencontre avec des anciens joueurs',
            'Séance de préparation tactique',
            'Match de qualification',
            'Match de coupe',
            'Match de championnat',
            'Match de barrage',
            'Séance de récupération',
            'Séance de vidéo analyse',
        ];
        
        // Option 1: Utilisation du modèle Type
        foreach ($evenements as $evenement) {
            Type::create([
                'nom' => $evenement
            ]);
        }
        
        // OU Option 2: Insertion plus rapide avec insert
        /*
        $typesData = [];
        foreach ($evenements as $evenement) {
            $typesData[] = [
                'nom' => $evenement,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        DB::table('types')->insert($typesData);
        */
    }
}