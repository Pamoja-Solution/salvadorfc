<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();
        
        return view('post.show', compact('post'));
    }
}