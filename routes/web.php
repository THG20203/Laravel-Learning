<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view(
        'jobs',
        /* Can have an array, with a key of jobs AND an array inside it with a list of jobs */
        [
            'jobs' => [
                [
                    /* id added - one key that'll always be unique to represent an individual item */
                    'id' => 1,
                    'title' => 'Director',
                    'salary' => '$50,000'
                ],
                [
                    'id' => 2,
                    'title' => 'Programmer',
                    'salary' => '$80,000'
                ],
                [
                    'id' => 3,
                    'title' => 'Teacher',
                    'salary' => '$40,000'
                ],
            ]
        ]
    );
});

/* Laravel will automatically detect jobs/{id} id is wrapped in braces, and it will know its a wildcard */
Route::get('/jobs/{id}', function ($id) {
    /* jobs variable created (duplicate information so that jobs data can be manipulated in wildcard for now */
    $jobs = [
        [
            /* id added - one key that'll always be unique to represent an individual item */
            'id' => 1,
            'title' => 'Director',
            'salary' => '$50,000'
        ],
        [
            'id' => 2,
            'title' => 'Programmer',
            'salary' => '$80,000'
        ],
        [
            'id' => 3,
            'title' => 'Teacher',
            'salary' => '$40,000'
        ],
    ];
    return view('contact');
});


Route::get('/contact', function () {
    return view('contact');
});
