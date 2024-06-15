<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    /* want to see the most recently create job first. hence adding latest() method. Adds an order by clause
    to SQL query. */
    /* for first argument can specify how many records do we want to show per page */
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
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
    request()->validate([
        /* provide an array of attributes that need validation */
        "title" => ["required", "min:3"],
        "salary" => ["required"],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        /* Whilst I haven't done authentication, will hard code an employer. */
        'employer_id' => 1,
    ]);

    /* after finishing entering the form would be good to redirect to the jobs page */
    return redirect("/jobs");
});

Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});

// GET - getting a page
// POST - submitting a form -> stores data in a database