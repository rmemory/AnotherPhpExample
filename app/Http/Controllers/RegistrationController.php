<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function create() 
    {
        return view('registration.create');
    }

    public function store(RegistrationRequest $request)
    {
        // None of the following occurs unless the validation passes
        $request->persist();

        /*
         * >>> session('message', 'Here is a default message');
         * => "Here is a default message"
         * >>> session(['message' => 'Something Custom']);
         * => null
         * >>> session('message', 'Here is a default message');
         * => "Something Custom
         */

        // These remain for the entire session, each time you sign in
        // in this case.

        // session('message', 'Here is a default message');
        // session(['message' => 'Something Custom']);

        // One time (ie. one request) message
        session()->flash('message', 'Thanks so much for signing up');

        // Go look in layouts.master for displaying the message

        //redirect to home page
        return redirect()->home();
    }
}
