<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\User;
use App\Events\PostCreated;
use Illuminate\Support\Facades\Auth;



class PostController extends Controller
{

    public function index()
{
    $posts = Post::paginate(3);

    return view('posts.index', compact('posts'));
}


public function create()
{
    // $users = User::all();

    return view('posts.create');
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
        $data = [
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'slug'=> Str::slug($request->input('title'))
        ];

        $post = Post::find($id);
        if($post->user_id != Auth::id()){
            return redirect()->route('posts.index');
        }

        if (!$post) {
            return abort(404);
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }


public function store(Request $request)
{
    // $request->validate([
    //     'user_id' => 'required|exists:users,id',
    //     'title' => 'required|string|max:255',
    //     'body' => 'required|string',
    // ]);

    $user = Auth::id();
    // Create a new post
    $post = Post::create([
        'user_id' => $user,
        'title' => $request->input('title'),
        'body' => $request->input('body'),
        'slug' => Str::slug($request->input('title'))
    ]);

    // Save the post
    $post->save();
    event(new PostCreated($post));
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
