<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view(
        'home',
        /* Can pass second argument to view function (will be an array) Where each of the keys are extracted into 
        variables once my view/template is loaded. */
        [
            'greeting' => "A test of change"
        ]
    );
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
