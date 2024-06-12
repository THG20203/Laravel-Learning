<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    /* all() eloquent method querying the database through the model class 
    use App\Models\Job */
    $jobs = Job::all();

    /* $job[0] - select first record within job listings table use [0]->salary 
    for instance, for the salary of the first record in the job listings table */
    dd($jobs[0]);

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
