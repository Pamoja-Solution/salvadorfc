<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Debut extends Controller
{
    public function Performances(){

// Supposons que vous avez récupéré les joueurs depuis la base de données
        $jouers = DB::table('jouers')->get();

        // Fonction pour calculer le score de performance
        function calculerScore($joueur) {
            $buts = (int)$joueur->but;
            $passe = (int)$joueur->passe;
            $matches = (int)$joueur->matches;

            // Formule de calcul du score
            return ($buts * 1) + ($passe * 0.8) + ($matches * 0.2);
        }

        // Ajouter le score à chaque joueur
        $jouersAvecScore = $jouers->map(function ($joueur) {
            $joueur->score = calculerScore($joueur);
            return $joueur;
        });

        // Trier les joueurs par score (du plus élevé au plus bas)
        $jouersTries = $jouersAvecScore->sortByDesc('score');

        // Extraire les 3 premiers joueurs
        $top3Jouers = $jouersTries->take(3);

        // Afficher les résultats
        foreach ($top3Jouers as $joueur) {
            echo "Nom: {$joueur->nom}, Score: {$joueur->score}, Buts: {$joueur->but}, Passes: {$joueur->passe}, Matches: {$joueur->matches}\n";
        }
    }
    public function index(){
        return view('welcome');
    }
}
