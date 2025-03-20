<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfilePhotoController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validateWithBag('updateProfilePhoto', [
            'image' => [
                'required',
                'image',
                'max:2048', // 1MB max
                'dimensions:min_width=100,min_height=100',
            ],
        ], [
            'image.required' => 'Veuillez sélectionner une image.',
            'image.image' => 'Le fichier doit être une image valide.',
            'image.max' => 'L\'image ne doit pas dépasser 1MB.',
            'image.dimensions' => 'L\'image doit avoir une taille minimale de 100x100 pixels.',
        ]);

        $user = $request->user();

        // Supprimer l'ancienne photo si elle existe
        if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }

        // Traitement et sauvegarde de la nouvelle photo
        $photo = $request->file('image');
        $filename = 'profile-photos/' . $user->id . '_' . time() . '.' . $photo->getClientOriginalExtension();
        
        // S'assurer que le dossier existe
        Storage::disk('public')->makeDirectory('profile-photos', 0755, true, true);
        
        // Sauvegarder l'image directement (sans redimensionnement)
        $path = $photo->storeAs('profile-photos', basename($filename), 'public');
        
        // Mettre à jour le chemin de la photo dans la base de données
        $user->image = $path;
        $user->save();

        return redirect()->back()->with('status', 'profile-photo-updated');
    }
}