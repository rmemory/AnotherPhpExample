<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Mail\WelcomeMail;

// Created using this: 
//  $ php artisan make:request RegistrationRequest

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Yes anyone can make the authorization request
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //Validate the data
        // If this fails, it will redirect back to the previous page
        // with the errors
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
    }

    // I've added this method:
    public function persist() 
    {
        $name = request('name');
        $email = request('email');
        $password = request('password');
        $password = Hash::make($password);

        // Create and save the user
        $user = User::create(compact('name', 'email', 'password'));

        // Sign in user
        auth()->login($user);

        // Send a welcome email
        // The to() method fetches the users email from the $user
        \Mail::to($user)->send(new WelcomeMail($user));
    }
}
