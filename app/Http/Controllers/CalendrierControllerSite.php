<?php

namespace App\Http\Controllers;

use App\Models\Calendrier;
use App\Models\CalendrierMatch;
use Illuminate\Http\Request;

class CalendrierControllerSite extends Controller
{
    //
    public function show(Calendrier $calendrier)
    {
        return view('calendriers.show', compact('calendrier'));
    }
    // Dans votre contrôleur (par exemple MatchController.php)
    /*
public function index()
{
    $matches = CalendrierMatch::with('competition')
        ->orderBy('date_match', 'desc')
        ->get()
        ->map(function ($match) {
            return [
                'id' => $match->id,
                'competition' => $match->competition->nom,
                'journee' => $match->journee,
                'date' => $match->date_match->format('Y-m-d'),
                'time' => $match->heure_match->format('H:i'),
                'homeTeam' => $match->statut === 'domicile' ? 'FC Salvador' : $match->adversaire,
                'homeLogo' => $match->statut === 'domicile' ? 'FC' : substr($match->adversaire, 0, 3),
                'awayTeam' => $match->statut === 'domicile' ? $match->adversaire : 'FC Salvador',
                'awayLogo' => $match->statut === 'domicile' ? substr($match->adversaire, 0, 3) : 'FC',
                'stadium' => $match->stade ?? ($match->statut === 'domicile' ? 'Stade Maurice' : 'Stade adverse'),
                'status' => $match->statut,
                'played' => $match->date_match < now(),
                'score' => $match->score // Ajoutez ce champ si vous stockez les scores
            ];
        });
        return view('calendrier-match.index',['matches' => $matches]);

    //return view('votre-vue', );
}*/



public function index()
{
    return view('calendrier-match.index'); // Votre vue qui contient le script
}

public function getMatches()
{
    $matches = CalendrierMatch::with('competition')
        ->orderBy('date_match', 'desc')
        ->get()
        ->map(function ($match) {
            return [
                'id' => $match->id,
                'competition' => $match->competition->nom ?? 'Autre compétition',
                'journee' => $match->journee,
                'date' => $match->date_match->format('Y-m-d'),
                'time' => $match->heure_match->format('H:i'),
                'homeTeam' => $match->statut === 'domicile' ? 'FC Salvador' : $match->adversaire,
                'homeLogo' => $match->statut === 'domicile' ? 'FC' : substr($match->adversaire, 0, 3),
                'awayTeam' => $match->statut === 'domicile' ? $match->adversaire : 'FC Salvador',
                'awayLogo' => $match->statut === 'domicile' ? substr($match->adversaire, 0, 3) : 'FC',
                'stadium' => $match->stade ?? ($match->statut === 'domicile' ? 'Stade Maurice' : 'Stade adverse'),
                'status' => $match->statut,
                'played' => $match->date_match->isPast(),
                'score' => $match->score ?? null
            ];
        });

    return response()->json($matches);
}
}
