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

        //redirect to home page
        return redirect()->home();
    }
}
