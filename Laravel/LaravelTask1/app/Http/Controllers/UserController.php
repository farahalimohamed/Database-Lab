<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        return view('index');
    }

    
    public function create()
    {
        return 'Show the form for creating a new resource.';
        
    }

   
    public function store(Request $request)
    {
       
    }

   
    public function show(string $id)
    {
        return view('show', ['id' => $id]);
    }

    
    public function edit(string $id)
    {
        return view('edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}