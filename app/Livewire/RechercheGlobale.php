<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Calendrier;
use Livewire\Component;
use Illuminate\Support\Str;

class RechercheGlobale extends Component
{
    public $showModal = false;
    public $searchTerm = '';
    public $isLoading = false;
    public $results = [];
    public function mount()
    {
        $this->results = ['posts' => [], 'calendriers' => []];
    }
    public function updatedSearchTerm()
    {
        $this->isLoading = true;
        if (strlen($this->searchTerm) < 2) {
            $this->results = ['posts' => [], 'calendriers' => []];
            $this->isLoading = false;
            return;
        }
        // Recherche dans la table posts 
        $posts = Post::where('status', true)->where(function ($query) {
            $query->where('titre', 'like', '%' . $this->searchTerm . '%')->orWhere('contenus', 'like', '%' . $this->searchTerm . '%')->orWhere('slug', 'like', '%' . $this->searchTerm . '%');
        })->limit(5)->get();
        // Recherche dans la table calendriers
        $calendriers = Calendrier::where('titre', 'like', '%' . $this->searchTerm . '%')->orWhere('description', 'like', '%' . $this->searchTerm . '%')->limit(5)->get();
        $this->results = ['posts' => $posts, 'calendriers' => $calendriers];
        $this->isLoading = false;
    }
    public function openModal()
    {
        //dump('openModal called');
        $this->showModal = true;
    }
    public function closeModal()
    {
        $this->showModal = false;
        $this->reset('searchTerm');
    }
    public function render()
    {
        //dd($this->showModal); 
       // dump($this->results);
        return view('livewire.recherche-globale');
    }
}
