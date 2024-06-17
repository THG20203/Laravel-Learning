<?php

// Simplifying below - importing controller into web - short cut for code below
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

// Shorthand for displaying view for home 
Route::view('/', 'home');

/* Job route group where all assume Job Controller */
Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get("/jobs/create", 'create');
    Route::get('/jobs/{job}', 'show');
    Route::post('/jobs', 'store');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::patch("/jobs/{job}", 'update');
    Route::delete("/jobs/{job}", 'destroy');
});

// Shorthand for displaying view for contact
Route::view('/contact', 'contact');

// GET - getting a page
// POST - submitting a form -> stores data in a database
/* Patch and delete cannot be recognised directly by browser like GET and POST can be, so will need 
blade directive */
// PATCH - updating a resource
// DELETE - deleting a resource 