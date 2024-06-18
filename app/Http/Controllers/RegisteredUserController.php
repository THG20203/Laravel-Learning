<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /* in registered user controller we need to add our action to create */
    public function create()
    {
        /* return a view, putting it all under a auth namespace */
        return view('auth.register');
    }
    /* what needs to happen to register a user. */
    public function store()
    {
        // validate
        $validatedAttributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            /* Confirmed when you apply it to a request field, laravel is going to look for another attribute 
            that has password_confirmation. Gunna make sure the 'password' attribute and the password confirmation
            attribute match or are the same */
            'password' => ['required', Password::min(6), 'confirmed'],
        ]);

        dd($validatedAttributes);

        // create the user in database


        // log in
        // redirect somewhere
    }
}
