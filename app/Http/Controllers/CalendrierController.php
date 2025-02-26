<?php
namespace App\Http\Controllers;

use App\Models\Calendrier;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CalendrierController extends Controller
{
    
    public function index()
    {
        $events = Calendrier::where('date_debut', '>', now())->orderBy('date_debut')->get();
        return view('admin.calendrier.index', compact('events'));
    }

    public function create()
    {
        return view('admin.calendrier.create',[ 'calendrier'=>new Calendrier(),'types'=>Type::all()]);
    }

    public function store(Request $request)
    {
        $validated =$request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'type_id' => 'required|exists:types,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,JPEG,PNG,JPG,GIF,svg,SVG|max:4048',

        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('events', 'public');
            $validated['photo'] = $path;
        }

        Calendrier::create($validated);

        return redirect()->route('admin.calendrier.index')->with('success', 'Événement créé avec succès.');
    }

    public function show(Calendrier $calendrier)
    {
        return view('admin.calendrier.show', compact('calendrier'));
    }

    public function edit(Calendrier $calendrier)
    {
        //$event=$calendrier;

        return view('admin.calendrier.create', ['calendrier'=>$calendrier,'types'=>Type::all()]);
    }

    public function update(Request $request, Calendrier $calendrier)
    {
        $validated =$request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'type_id' => 'required|exists:types,id',

            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,JPEG,PNG,JPG,GIF,svg,SVG|max:4048',

        ]);
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne image
            if ($calendrier->photo) {
                Storage::disk('public')->delete($calendrier->photo);
            }
            $path = $request->file('photo')->store('events', 'public');
            $validated['photo'] = $path;
        }


        $calendrier->update($validated);

        return redirect()->route('admin.calendrier.show',["calendrier"=>$calendrier])->with('success', 'Événement mis à jour avec succès.');
    }

    public function destroy(Calendrier $calendrier)
    {
        $calendrier->delete();
        return redirect()->route('admin.calendrier.index')->with('success', 'Événement supprimé avec succès.');
    }
}