<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostInteractions extends Component
{
    public $post;
    public $comments;
    public $likesCount;
    public $commentContent = ''; // Initialiser à une chaîne vide

    public $userLike;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->comments = $post->comments()->with('user')->latest()->get();
        $this->likesCount = $post->likes()->count();
        $this->userLike = $post->likes()->where('user_id', auth()->id())->exists();
    }

    public function addComment()
    {
        // Valider le contenu du commentaire
        $this->validate(['commentContent' => 'required|min:3']);

        // Ajouter le commentaire
        $this->post->commentaires()->create([
            'user_id' => auth()->id(),
            'content' => $this->commentContent,
        ]);

        // Réinitialiser le champ de texte
        $this->commentContent = ''; // Réinitialiser à une chaîne vide

        // Recharger les commentaires
        $this->comments = $this->post->commentaires()->with('user')->latest()->get();
    }


    public function toggleLike()
    {
        if ($this->userLike) {
            $this->post->likes()->where('user_id', auth()->id())->delete();
            $this->likesCount--;
            $this->userLike = false;
        } else {
            $this->post->likes()->create(['user_id' => auth()->id()]);
            $this->likesCount++;
            $this->userLike = true;
        }
    }

    public function render()
    {
        return view('livewire.post-interactions');
    }
}