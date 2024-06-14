<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    /* for first argument can specify how many records do we want to show per page */
    $jobs = Job::with('employer')->cursorPaginate(3);
    return view('jobs.index', ["jobs" => $jobs]);
});

// Show a page to create a new job
Route::get("/jobs/create", function () {
    return view('jobs.create');
});

// Wildcard should go close to the bottom of route declarations
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

// Writing out first post request 
route::post('/jobs', function () {
    /* Skipping validation for now */

    Job::create([
        'title' => '',
        'salary' => '',
        'employer_id' => '',
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});
