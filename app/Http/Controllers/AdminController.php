<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        $posts_count = Post::where('status', 'published')->count();
        return view('admin.index', compact('posts_count'));
    }
}