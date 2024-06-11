<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

$jobs = [
    [
        "id" => 1,
        "title" => "Director",
        "salary" => "$50,000"
    ],
    [
        "id" => 2,
        "title" => "Programmer",
        "salary" => "$10,000"
    ],
    [
        "id" => 3,
        "title" => "Teacher",
        "salary" => "$40,000"
    ]
];

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () use ($jobs) {
    /* view('jobs', ["job" => $jobs]) means that the function is returning 
    a view named jobs. This view will receive data in the form of an array 
    where the key is "job" and the value is whatever is stored in $jobs. This 
    allows the jobs view to access the $jobs array data. */
    return view('jobs', ["job" => $jobs]);
});

Route::get('/jobs/{id}', function ($id) use ($jobs) {
    $job = Arr::first($jobs, fn ($job) => $job["id"] == $id);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
