<?php

// Simplifying below - importing controller into web - short cut for code below
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

// Shorthand for displaying view for home 
Route::view('/', 'home');

/* Route resources. resource registers all of the routes for a a typical restful or resourceful 
controller. */

// First argument is resource name. this will also be the url (in this case jobs)
// Second argument is the controller that is responsible for it, in this case JobController
// Third argument is except, rule out things we don't need routes for that would normallhy be in resource
Route::resource('jobs', JobController::class, ['except' => ['edit']]);

// Shorthand for displaying view for contact
Route::view('/contact', 'contact');

// GET - getting a page
// POST - submitting a form -> stores data in a database
/* Patch and delete cannot be recognised directly by browser like GET and POST can be, so will need 
blade directive */
// PATCH - updating a resource
// DELETE - deleting a resource 