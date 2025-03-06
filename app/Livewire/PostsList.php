<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Categorie;
use Livewire\Component;
use Livewire\WithPagination;

class PostsList extends Component
{
    use WithPagination;

    public $search = '';
    public $categorieId = '';
    public $orderBy = 'created_at';
    public $orderDirection = 'desc';
    public $perPage = 12;

    protected $queryString = [
        'search' => ['except' => ''],
        'categorieId' => ['except' => ''],
        'orderBy' => ['except' => 'created_at'],
        'orderDirection' => ['except' => 'desc'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategorieId()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = Categorie::orderBy('name',"asc")->get();

        $posts = Post::where('status', true)
            ->when($this->search, function ($query) {
                return $query->where(function ($query) {
                    $query->where('titre', 'like', '%' . $this->search . '%')
                        ->orWhere('contenus', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->categorieId, function ($query) {
                return $query->where('categorie_id', $this->categorieId);
            })
            ->orderBy($this->orderBy, $this->orderDirection)
            ->paginate($this->perPage);

        return view('livewire.posts-list', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    public function setOrderBy($field)
    {
        if ($this->orderBy === $field) {
            $this->orderDirection = $this->orderDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->orderBy = $field;
            $this->orderDirection = 'asc';
        }
    }
}