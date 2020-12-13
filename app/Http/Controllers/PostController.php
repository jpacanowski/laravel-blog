<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function create()
    {
        return view('admin.posts-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        $post = [
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Str::slug($request->title),
            'author_id' => 1,//Auth::user()->id
            'status' => 'published'
        ];

        if(!is_null(Post::create($post))) {
            return redirect('/admin/posts')
            ->with('success', 'Post created successfully.');
        }
        else {
            return back()
            ->with('failed', 'Post not created.');
        }
    }
}
