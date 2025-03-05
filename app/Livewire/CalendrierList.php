<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Calendrier;
use App\Models\Type;

class CalendrierList extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'tailwind'; // Ajouter le thème de pagination

    public $search = '';
    public $selectedType = '';
    public $types = [];

    // Les propriétés search et selectedType doivent être explicitement écoutées
    protected $queryString = ['search', 'selectedType'];

    public function mount()
    {
        $this->types = Type::all(); // Charger les types une seule fois
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectedType()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Construire la requête de base
        $query = Calendrier::query();

        // Appliquer la recherche si $search n'est pas vide
        if (!empty($this->search)) {
            $query->where(function ($query) {
                $query->where('titre', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Appliquer le filtre par type si $selectedType n'est pas vide
        if (!empty($this->selectedType)) {
            $query->where('type_id', $this->selectedType);
        }

        // Paginer les résultats
        $calendriers = $query->orderBy('date_debut', 'desc')->paginate(15);

        // Retourner la vue avec les données
        return view('livewire.calendrier-list', [
            'calendriers' => $calendriers,
        ]);
    }
}