<?php

namespace App\Http\Controllers;

use App\Http\Requests\JouerModifRequest;
use App\Http\Requests\JouerRequest;
use App\Models\Categorie;
use App\Models\Jouer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mledoze\Countries\Countries;
class JouerControllerSite extends Controller
{
    public function index()
    {
        $jouers = Jouer::latest()->paginate(100);
        return view('admin.jouers.index', compact('jouers'));
    }

    public function create()
    {
        return view('admin.jouers.create', ['jouers'=> new Jouer()] );
    }

    public function store(JouerRequest $request)
    {
        //dd($request->validated());

        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('jouers', 'public');
            $validated['photo'] = $path;
        }
        
        Jouer::create($validated);

        return redirect()->route('admin.jouers.index')
            ->with('success', 'Article créé avec succès.');
    }

    public function edit(Jouer $jouer)
    {
        $jouers=$jouer;
        return view('admin.jouers.create', compact('jouers'));
    }

    public function update(JouerModifRequest $request, Jouer $jouer)
    {
       

        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne image
            if ($jouer->photo) {
                Storage::disk('public')->delete($jouer->photo);
            }
            $path = $request->file('photo')->store('jouers', 'public');
            $validated['photo'] = $path;
        }

        $jouer->update($validated);

        return redirect()->route('admin.jouers.index')
            ->with('success', ' Jouer mis à jour avec succès.');
    }

    public function destroy(Jouer $jouer)
    {
        if ($jouer->photo) {
            Storage::disk('public')->delete($jouer->photo);
        }
        
        $jouer->delete();

        return redirect()->route('admin.jouers.index')
            ->with('success', 'Jouer supprimé avec succès.');
    }
    public function show(Jouer $post){
        //dd($post);
        return view('admin.jouers.show',compact('post'));
    }
    public function newsection(Jouer $post){
        return view('admin.jouers.newsection',compact('post'));
    }
}
