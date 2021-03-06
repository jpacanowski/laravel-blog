<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        $posts_count = Post::where('status', 'published')->count();
        $drafts_count = Post::where('status', 'draft')->count();
        return view('admin.index', compact([
            'posts_count', 'drafts_count'
        ]));
    }

    public function posts()
    {
        $posts = Post::orderByDesc('created_at')->get();
        return view('admin.posts', compact('posts'));
    }
}
