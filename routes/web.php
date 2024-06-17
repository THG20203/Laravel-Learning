<?php

// Simplifying below - importing controller into web - short cut for code below
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

// Index (for jobs)

/* below - first argument is the job  controller, second operation is the operation we want laravel to call
in this case its index */
Route::get('/jobs', [JobController::class, 'index']);

// Show a page to create a new job
Route::get("/jobs/create", function () {
});

// Show 
Route::get('/jobs/{job}', function (Job $job) {
});

// Store
route::post('/jobs', function () {
});

// Edit
Route::get('/jobs/{job}/edit', function (Job $job) {
});

// Update
Route::patch("/jobs/{job}", function (Job $job) {
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