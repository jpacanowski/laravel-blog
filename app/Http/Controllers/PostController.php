<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'published')
                    ->orderByDesc('created_at')
                    ->get();
        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('posts.show', compact('post'));
    }
}
