<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store()
    {
        // validate user

        // attempt to login user

        // regenerate the session token

        // redirect
    }
    public function destroy()
    {
        /* with logout, don't have to specify a user cause it assumes the current user. */
        Auth::logout();
        /* after logout a user, redirect them to the home page */
        return redirect('/');
    }
}
