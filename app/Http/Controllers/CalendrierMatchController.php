<?php

namespace App\Http\Controllers;

use App\Models\CalendrierMatch;
use Illuminate\Http\Request;

class CalendrierMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calendriers = CalendrierMatch::all();
        return view('calendrier.index', compact('calendriers'));
    }

    public function create()
    {
        return view('calendrier.create');
    }

    public function store(Request $request)
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

        CalendrierMatch::create($request->all());

        return redirect()->route('calendrier.index')->with('success', 'Match ajouté avec succès.');
    }

    public function show(CalendrierMatch $calendrier)
    {
        return view('calendrier.show', compact('calendrier'));
    }

    public function edit(CalendrierMatch $calendrier)
    {
        return view('calendrier.edit', compact('calendrier'));
    }

    public function update(Request $request, CalendrierMatch $calendrier)
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

        $calendrier->update($request->all());

        return redirect()->route('calendrier.index')->with('success', 'Match mis à jour avec succès.');
    }

    public function destroy(CalendrierMatch $calendrier)
    {
        $calendrier->delete();

        return redirect()->route('calendrier.index')->with('success', 'Match supprimé avec succès.');
    
    }
}
