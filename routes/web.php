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

// Show - (Wildcard should go close to the bottom of route declarations)
/* Adding a type with Job $job - I expect a job instance */
/* (Explanation from Lecture 19 for context). Wildcard and parameter name - so {job} and $job in that first 
line need to be identical. Job is adding a types to the parameter */
Route::get('/jobs/{job}', function (Job $job) {
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

// Edit
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch("/jobs/{job}", function (Job $job) {
    // validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    /* update job */
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    // and persist
    // redirect
    // '/jobs/' . $job->id concatenates these to form a single string URL.
    return redirect('/jobs/' . $job->id);
});

// Destroy
Route::delete("/jobs/{job}", function (Job $job) {
    // authorise (On hold...)

    // delete the job
    $job->delete();

    // redirect - send you back to index job view, sowing all the jobs
    return redirect("/jobs");
});


// Contact
Route::get('/contact', function () {
    return view('contact');
});

// GET - getting a page
// POST - submitting a form -> stores data in a database

// PATCH - updating a resource
// DELETE - deleting a resource 