<?php
namespace App\Http\Controllers;

use App\Models\Favori;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriController extends Controller
{
    // Ajouter ou supprimer un favori
    public function toggle(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
        ]);

        $user = Auth::user();
        $post = Post::findOrFail($request->post_id);

        // Vérifier si le post est déjà en favori
        if ($user->favoris()->where('post_id', $post->id)->exists()) {
            // Supprimer le favori
            $user->favoris()->detach($post->id);
            return response()->json(['status' => 'removed']);
        } else {
            // Ajouter le favori
            $user->favoris()->attach($post->id);
            return response()->json(['status' => 'added']);
        }
    }

    // Afficher la liste des favoris de l'utilisateur
    public function index()
    {
        $user = Auth::user();
        $favoris = $user->favoris()->with('user')->paginate(10); // Pagination pour la liste
        return view('favoris.index', compact('favoris'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Favori $favori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favori $favori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favori $favori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favori $favori)
    {
        //
    }
}
