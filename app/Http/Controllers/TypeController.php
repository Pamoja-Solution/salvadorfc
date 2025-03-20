<?php

namespace App\Http\Controllers;

use App\Http\Requests\Typeres;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::paginate(5);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create',[ 'types'=>new Type()]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Typeres $request)
    {
        $validated =$request->validated();

       // dd($validated);

        Type::create($validated);

        return redirect()->route('admin.types.index')->with('success', 'Événement créé avec succès.');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
        return view('admin.types.create', ['types'=>$type]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
    // dd($type);
        $validated =$request->validate([
            'nom' => 'required|string|min:2',
        ]);
        $type->update($validated);
        return redirect()->route('admin.types.index')->with('success', 'Types mis à jour avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
        $type->delete();
        return redirect()->route('admin.types.index')->with('success', 'Types supprimé avec succès.');

    }
}
