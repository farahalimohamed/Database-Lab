<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\User;



class PostController extends Controller
{

    public function index()
{
    $posts = Post::paginate(3);

    return view('posts.index', compact('posts'));
}


public function create()
{
    $users = User::all();
    return view('posts.create', compact('users'));
}

public function edit($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return abort(404); // or redirect to a 404 page
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = Post::find($id);

        if (!$post) {
            return abort(404);
        }

        $post->update($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }


public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'title' => 'required|string|max:255',
        'body' => 'required|string',
    ]);


    // Create a new post
    $post = new Post([
        'user_id' => $request->input('user_id'),
        'title' => $request->input('title'),
        'body' => $request->input('body'),
    ]);

    // Save the post
    $post->save();

    return redirect()->route('posts.index');
}

public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return abort(404);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
    
}
