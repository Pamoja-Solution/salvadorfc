<?php

namespace App\Http\Controllers;

use App\Models\Calendrier;
use App\Models\Categorie;
use App\Models\Jouer;
use App\Models\Post;
use Illuminate\Http\Request;

class Debut extends Controller
{
    public function Performances(){

        $jouers = Jouer::all();

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
        return $top3Jouers;
        
    }
    public function index(){
        //dd(Calendrier::orderBy('asc')->limit(1)->get());
        $posts = Post::with('category')->where('status',1)->latest()->get();
        $categories = Categorie::orderBy('name','asc')->limit(5)->get();
        return view('welcome',[
            'jouers' =>self::Performances(),
            "dernier"=>Calendrier::orderBy("id",'desc')->first(),
            'posts' => $posts,
            'categories' => $categories,
            
        ]);
    }
}
