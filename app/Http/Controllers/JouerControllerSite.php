<?php

namespace App\Http\Controllers;

use App\Http\Requests\JouerRequest;
use App\Models\Categorie;
use App\Models\Jouer;
use Illuminate\Http\Request;
use Mledoze\Countries\Countries;
class JouerControllerSite extends Controller
{
    public function index()
    {
        $jouers = Jouer::with(['type', 'categorie', 'user'])->latest()->paginate(100);
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
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('jouers', 'public');
            $validated['image'] = $path;
        }

        $validated['user_id'] = auth()->id();
        
        Jouer::create($validated);

        return redirect()->route('admin.jouers.index')
            ->with('success', 'Article créé avec succès.');
    }

    public function edit(Jouer $post)
    {
        $types = Type::select("id","etat")->get();
        $categories = Categorie::select("id","name")->get();
        $natures=Nature::select("id","nom")->get();
        return view('admin.jouers.edit', compact('post', 'types', 'categories','natures'));
    }

    public function update(PostValidator $request, Jouer $post)
    {
       

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $path = $request->file('image')->store('jouers', 'public');
            $validated['image'] = $path;
        }

        $post->update($validated);

        return redirect()->route('admin.jouers.index')
            ->with('success', 'Article mis à jour avec succès.');
    }

    public function destroy(Jouer $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        
        $post->delete();

        return redirect()->route('admin.jouers.index')
            ->with('success', 'Article supprimé avec succès.');
    }
    public function show(Jouer $post){
        //dd($post);
        return view('admin.jouers.show',compact('post'));
    }
    public function newsection(Jouer $post){
        return view('admin.jouers.newsection',compact('post'));
    }
}
