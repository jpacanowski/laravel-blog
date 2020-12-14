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

        if(!is_null(Post::create($post)))
        {
            return redirect('/admin/posts')
            ->with('success', 'Post created successfully.');
        }
        else
        {
            return back()->with('failed', 'Post not created.');
        }
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts-edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        $update = [
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Str::slug($request->title)
        ];

        $post = Post::find($id);

        if(!is_null($post->update($update)))
        {
            return redirect('/admin/posts/edit/'.$post->id)
            ->with('success', 'Post updated successfully.');
        }
        else
        {
            return back()->with('failed', 'Post not updated.');
        }
    }

    public function publish($id)
    {
        $post = Post::find($id);
        $post->status = 'published';

        if(!is_null($post->save()))
        {
            return back()->with('success', 'Post published successfully.');
        }
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if(!is_null($post->delete()))
        {
            return back()->with('success', 'Post deleted successfully.');
        }
        else
        {
            return back()->with('failed', 'Post not deleted.');
        }
    }
}
