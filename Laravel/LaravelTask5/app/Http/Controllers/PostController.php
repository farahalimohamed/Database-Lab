<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\User;
use App\Events\PostCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{

    public function index()
{
    // $posts = Post::paginate(3);
    $posts = Post::withTrashed()->paginate(3);

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
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if (Auth::check()) {
            $user = Auth::id();
    
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('posts', 'public');
    
                $post = Post::create([
                    'user_id' => $user,
                    'title' => $request->input('title'),
                    'body' => $request->input('body'),
                    'slug' => Str::slug($request->input('title')),
                    'image' => $imagePath,
                ]);
    
                // Save the post
                $post->save();
                event(new PostCreated($post));
    
                return redirect()->route('posts.index');
            }
        }
    
        // Handle the case where the user is not authenticated or there is no image
        return redirect()->route('login')->with('error', 'You must be logged in and provide an image to create a post.');
    }
    

// public function destroy($id)
//     {
//         $post = Post::find($id);

//         if (!$post) {
//             return abort(404);
//         }

//         $post->delete();

//         return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
//     }
    
public function destroy($id)
{
    $post = Post::withTrashed()->find($id);

    if (!$post) {
        return abort(404);
    }

    if ($post->trashed()) {
        // If the post is soft deleted, restore it
        $post->restore();
        return redirect()->route('posts.index')->with('success', 'Post restored successfully!');
    } else {
        // If the post is not deleted, perform a soft delete
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
}
