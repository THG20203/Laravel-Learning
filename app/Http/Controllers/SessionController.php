<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store()
    {
        // validate user - save validated users to a an attributes variable 
        $attributes = request()->validate([
            /* Email is required - email field must be present in the request data. Email - email field
            must contain a valid email address. */
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // attempt to login user

        /* attempt parameters:
        First parameter - credentials
        Second parameter - if you want the application to remember the user, set remember to true.
        - Credentials are the email address and the password. - so pass in attributes variable 
        */

        /* if you could not login the user, then throw a validation exception, gets converted into a validation 
        error in the form. */
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                /* withMessages = messages to associate the error with. */
                'email' => 'Sorry, those credentials do not match.'
            ]);
        }

        // regenerate the session token
        /* Security thing which recycles the session token */
        request()->session()->regenerate();

        // redirect
        return redirect('/jobs');
    }
    public function destroy()
    {
        /* with logout, don't have to specify a user cause it assumes the current user. */
        Auth::logout();
        /* after logout a user, redirect them to the home page */
        return redirect('/');
    }
}
