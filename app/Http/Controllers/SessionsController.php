<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function __constructor() 
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create() 
    {
        return view('sessions.create');
    }

    public function store() 
    {
        // Attempt to authenticate the user. Attempt takes care of the
        // validation, and if valid will sign them in.
        // If not redirect back
        if (!auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }

        // redirect to home page
        return redirect()->action('PostsController@index');
    }

    public function destroy() 
    {
        auth()->logout();

        // redirect to home page
        return redirect()->action('PostsController@index');
    }
}
