<?php

namespace App\Http\Controllers;

use App\Models\CalendrierMatch;
use App\Models\Competition;
use Illuminate\Http\Request;

class CalendrierMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calendriers = CalendrierMatch::all();
        return view('admin.calendrier-match.index', compact('calendriers'));
    }

    public function create()
    {
        return view('admin.calendrier-match.create',[
            'match'=> new CalendrierMatch(),
            "competition"=> Competition::select('id',"nom")->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'competition_id' => 'required|exists:competitions,id',
            'journee' => 'nullable',
            'date_match' => 'required|date',
            'heure_match' => 'required',
            'adversaire' => 'required',
            'stade' => 'nullable|min:3',
            'statut' => 'required',
        ]);

        CalendrierMatch::create($request->all());

        return redirect()->route('admin.calendrier-match.index')->with('success', 'Match ajouté avec succès.');
    }

    public function show(CalendrierMatch $calendrierMatch)
    {
        return view('admin.calendrier.show', compact('calendrier'));
    }

    public function edit(CalendrierMatch $calendrierMatch)
    {
        $match = $calendrierMatch;
        $competition= Competition::select('id',"nom")->get();

        return view('admin.calendrier-match.create', compact('match', 'competition'));
    }

    public function update(Request $request, CalendrierMatch $calendrierMatch)
    {
        $request->validate([
            'competition' => 'required',
            'journee' => 'required',
            'date_match' => 'required|date',
            'heure_match' => 'required',
            'equipe_domicile' => 'required',
            'equipe_exterieur' => 'required',
            'stade' => 'required',
            'statut' => 'required',
        ]);

        $calendrierMatch->update($request->all());

        return redirect()->route('admin.calendrier.index')->with('success', 'Match mis à jour avec succès.');
    }

    public function destroy(CalendrierMatch $calendrierMatch)
    {
        $calendrierMatch->delete();

        return redirect()->route('admin.calendrier-match.index')->with('success', 'Match supprimé avec succès.');
    
    }
}
