<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::leftJoin('posts', 'users.id', '=', 'posts.user_id')
        //         ->select('users.id', 'users.name', 'users.email', 'users.email_verified_at', DB::raw('COUNT(posts.id) as post_count'))
        //         ->groupBy('users.id', 'users.name', 'users.email', 'users.email_verified_at')
        //         ->paginate(3);
        $users = User::paginate(3);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function edit($id)
    {
        $user = User::find($id);

        // Handle the case where the user is not found
        if (!$user) {
            return abort(404); // or redirect to a 404 page
        }

        return view('users.edit', compact('user'));
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return abort(404); 
        }

        return view('users.show', compact('user'));
    }
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|min:8',
        ]);

        $user = User::find($id);

        if (!$user) {
            return abort(404);
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        // Find the user (including soft deleted users)
        $user = User::withTrashed()->find($id);

        // Handle the case where the user is not found
        if (!$user) {
            return abort(404); // or redirect to a 404 page
        }

        // Soft delete the user
        $user->delete();

        // Redirect to the user list with a success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

    public function createPost($userId)
{
    $user = User::find($userId);

    if (!$user) {
        return abort(404); 
    }

    return view('posts.create', compact('user'));
}
}
