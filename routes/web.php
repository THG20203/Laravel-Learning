<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view(
        'home',
        /* Can have an array, with a key of jobs AND an array inside it with a list of jobs */
        [
            'jobs' => [
                [
                    'title' => 'Director',
                    'salary' => '$50,000'
                ],
                [
                    'title' => 'Programmer',
                    'salary' => '$80,000'
                ],
                [
                    'title' => 'Teacher',
                    'salary' => '$40,000'
                ],
            ]
        ]
    );
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
