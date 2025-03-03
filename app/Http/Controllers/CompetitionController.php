<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competition = Competition::all();

        return view('admin.competitions.index',['competitions' =>$competition]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.competitions.create',['competition' =>new Competition()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom' => 'required',
            'description' => 'nullable|min:5',
            
        ]);

        Competition::create($request->all());

        return redirect()->route('admin.competitions.index')->with('success', 'Compétition ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Competition $competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competition $competition)
    {
        //
        return view('admin.competitions.create', compact('competition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competition $competition)
    {
        //
        $request->validate([
            'nom' => 'required',
            'description' => 'nullable|min:5',
            
        ]);

        $competition->update($request->all());

        return redirect()->route('admin.competitions.index')->with('success', 'Compétition Modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competition $competition)
    {
        //
        $competition->delete();

        return redirect()->route('admin.competitions.index')->with('success', 'Compétition supprimée avec succès.');
    }
}
