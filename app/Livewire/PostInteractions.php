<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class PostInteractions extends Component
{
    use WithPagination; // Ajoute la pagination Livewire

    public $post;
    public $likesCount;
    public $commentContent = '';
    public $userLike;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->likesCount = $post->likes()->count();
        $this->userLike = $post->likes()->where('user_id', auth()->id())->exists();
    }

    public function addComment()
    {
        $this->validate(['commentContent' => 'required|min:3']);

        $this->post->commentaires()->create([
            'user_id' => auth()->id(),
            'content' => $this->commentContent,
        ]);

        $this->commentContent = '';

        // Rafraîchir la pagination après ajout
        $this->resetPage();
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
    public function updatedPage()
    {
        $this->dispatch('scroll-to-comments');    }
    public function render()
    {
        return view('livewire.post-interactions', [
            'comments' => $this->post->commentaires()->with('user')->latest()->paginate(5) // 5 commentaires par page
        ]);
    }
}
