<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    /* in registered user controller we need to add our action to create */
    public function create()
    {
        /* return a view, putting it all under a auth namespace */
        return view('auth.register');
    }
    public function store()
    {
        dd('todo');
    }
    public function login()
    {
        /* return a view, putting it all under a auth namespace */
        return view('auth.login');
    }
}
