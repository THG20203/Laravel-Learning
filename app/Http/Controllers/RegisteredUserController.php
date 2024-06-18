<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            /* Confirmed when you apply it to a request field, laravel is going to look for another attribute 
            that has password_confirmation. Gunna make sure the 'password' attribute and the password confirmation
            attribute match or are the same */
            'password' => ['required', Password::min(6), 'confirmed'],
        ]);

        // create the user in database
        /* store in user variable */
        $user = User::create($attributes);

        // log in
        /* first argument of login is the user I want to login. */
        Auth::login($user);

        // redirect somewhere
        return redirect('/jobs');
    }
}
