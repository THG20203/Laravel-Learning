<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    /* in registered user controller we need to add our action to create */
    public function create()
    {
        // sanity check of did I actually hit this endpoint?
        dd('Hello, registered user test');
    }
}
