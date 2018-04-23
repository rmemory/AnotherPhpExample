<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Mail\WelcomeMail;

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

        // Send a welcome email
        \Mail::to($user)->send(new WelcomeMail($user));

        //redirect to home page
        return redirect()->home();
    }
}
