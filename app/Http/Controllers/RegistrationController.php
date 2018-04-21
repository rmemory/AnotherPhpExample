<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class RegistrationController extends Controller
{
    public function create() 
    {
        return view('registration.create');
    }

    public function store(Request $request)
    {
        //Validate the data
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $name = request('name');
        $email = request('email');
        $password = request('password');
        $password = Hash::make($password);

        // Create and save the user
        $user = User::create(compact('name', 'email', 'password'));

        // Sign in user
        auth()->login($user);

        //redirect to home page
        return redirect()->home();
    }
}
