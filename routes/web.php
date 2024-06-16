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

// Edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch("/jobs/{id}", function ($id) {
    // validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    // authorize - i.e. do you have permission to update the job (On hold..)
    // update the job

    /* find the job? - use findOrFail -> i.e. try and find a job with matching id, but 
    if couldn't, abort */
    $job = Job::findOrFail($id);

    /* update each job 
    $job->title = request('title');
    $job->salary = request('salary');
    /* save within database 
    $job->save(); */

    /* alternative way of updating job is below: */
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
Route::delete("/jobs/{id}", function ($id) {
    // authorise (On hold...)


    // delete the job
    $job = Job::findOrFail($id);
    $job->delete();

    // redirect
    return redirect();
});


// Contact
Route::get('/contact', function () {
    return view('contact');
});

// GET - getting a page
// POST - submitting a form -> stores data in a database

// PATCH - updating a resource
// DELETE - deleting a resource 