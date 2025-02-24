<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Jouer;

class JouerComponent extends Component
{
    use WithFileUploads;

    public $jouers;
    public $nom, $nationnalite, $date_de_naissance, $photo, $taille, $poids, $dorsale, $but, $passe, $matches, $historique;
    public $jouer_id;
    public $isOpen = false;

    public function render()
    {
        $this->jouers = Jouer::all();
        return view('livewire.jouer-component');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function resetInputFields()
    {
        $this->nom = '';
        $this->nationnalite = '';
        $this->date_de_naissance = '';
        $this->photo = '';
        $this->taille = '';
        $this->poids = '';
        $this->dorsale = '';
        $this->but = '';
        $this->passe = '';
        $this->matches = '';
        $this->historique = '';
        $this->jouer_id = '';
    }

    public function store()
    {
        $this->validate([
            'nom' => 'required',
            'nationnalite' => 'required',
            'date_de_naissance' => 'required|date',
            'photo' => 'nullable|image|max:2048', // 2MB Max
            'taille' => 'required',
            'poids' => 'required',
            'dorsale' => 'required',
            'but' => 'required',
            'passe' => 'required',
            'matches' => 'required',
            'historique' => 'nullable',
        ]);

        $data = [
            'nom' => $this->nom,
            'nationnalite' => $this->nationnalite,
            'date_de_naissance' => $this->date_de_naissance,
            'taille' => $this->taille,
            'poids' => $this->poids,
            'dorsale' => $this->dorsale,
            'but' => $this->but,
            'passe' => $this->passe,
            'matches' => $this->matches,
            'historique' => $this->historique,
        ];

        if ($this->photo) {
            $data['photo'] = $this->photo->store('photos', 'public');
        }

        Jouer::updateOrCreate(['id' => $this->jouer_id], $data);

        session()->flash('message', $this->jouer_id ? 'Jouer mis à jour avec succès.' : 'Jouer créé avec succès.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $jouer = Jouer::findOrFail($id);
        $this->jouer_id = $id;
        $this->nom = $jouer->nom;
        $this->nationnalite = $jouer->nationnalite;
        $this->date_de_naissance = $jouer->date_de_naissance;
        $this->photo = $jouer->photo;
        $this->taille = $jouer->taille;
        $this->poids = $jouer->poids;
        $this->dorsale = $jouer->dorsale;
        $this->but = $jouer->but;
        $this->passe = $jouer->passe;
        $this->matches = $jouer->matches;
        $this->historique = $jouer->historique;

        $this->openModal();
    }

    public function delete($id)
    {
        Jouer::find($id)->delete();
        session()->flash('message', 'Jouer supprimé avec succès.');
    }
}