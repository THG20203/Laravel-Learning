<?php

// Simplifying below - importing controller into web - short cut for code below
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});


Route::get('/jobs', [JobController::class, 'index']);
Route::get("/jobs/create", [JobController::class, 'create']);
Route::get('/jobs/{job}', [JobController::class], 'show');
Route::post('/jobs', [JobController::class], 'store');
Route::get('/jobs/{job}/edit', [JobController::class], 'edit');
Route::patch("/jobs/{job}", [JobController::class], 'update');
Route::delete("/jobs/{job}", [JobController::class], 'destroy');


// Contact
Route::get('/contact', function () {
    return view('contact');
});

// GET - getting a page
// POST - submitting a form -> stores data in a database
/* Patch and delete cannot be recognised directly by browser like GET and POST can be, so will need 
blade directive */
// PATCH - updating a resource
// DELETE - deleting a resource 