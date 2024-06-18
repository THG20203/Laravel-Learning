<?php

// Simplifying below - importing controllers into web - short cut for code below
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/* Typically put all the views at the top */
// Shorthand for displaying view for home 
Route::view('/', 'home');
// Shorthand for displaying view for contact
Route::view('/contact', 'contact');

/* Route resources. resource registers all of the routes for a a typical restful or resourceful 
controller. */

// First argument is resource name. this will also be the url (in this case jobs)
// Second argument is the controller that is responsible for it, in this case JobController
// Third argument is except, rule out things we don't need routes for that would normallhy be in resource
Route::resource('jobs', JobController::class, ['except' => ['edit']]);

// Auth
/* Registered User Controller first then action which I'm going to call create cause I'm creating a 
new user. -> */
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
/* login - cause we're creating new session */
Route::get('/login', [SessionController::class, 'login']);

// GET - getting a page
// POST - submitting a form -> stores data in a database
/* Patch and delete cannot be recognised directly by browser like GET and POST can be, so will need 
blade directive */
// PATCH - updating a resource
// DELETE - deleting a resource 