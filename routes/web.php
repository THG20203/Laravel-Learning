<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    /* all() eloquent method querying the database through the model class 
    use App\Models\Job */
    $jobs = Job::all(); // this didn't show anything in the browser? This can't be right?

    dd($jobs);

    // return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', ["jobs" => Job::all()]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
