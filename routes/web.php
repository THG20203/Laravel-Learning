<?php

// Simplifying below - importing controllers into web - short cut for code below
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// Creating a dummy route for mail get request.
Route::get('test', function () {
    // To send an email use Mail facade
    // to() function - specify who the email is 'to'
    \Illuminate\Support\Facades\Mail::to('tristanhgriffiths8@yahoo.com')->send(
        new \App\Mail\JobPosted()
    );

    // Provide some quick feedback to action with a return statement
    return 'Done';
});

/* Typically put all the views at the top */
// Shorthand for displaying view for home 
Route::view('/', 'home');
// Shorthand for displaying view for contact
Route::view('/contact', 'contact');

/* Adding all of the URL's back in, so can apply middleware on a per route basis. Moved away from using
route resources (resource registers all of the routes for a a typical restful or resourceful 
controller.) */
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);
/* can pass multiple middleware as an array, i.e. can:edit-job - can:provide the name of the gate, then pass 
in the relevant job. job at end of the can is referring to whatever the wildcard {job} is. */
/* this ->can('edit-job', 'job') is doing the job the Gate::authorize WAS doing in the JobController, so it can
be removed. */
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    /* No longer referencing a Gate closure from the AppServiceProvider - have a dedicated edit method in the 
    JobPolicy. So we reference the method name on the policy then feed it the corresponding job model. Laravel
    is smart enough to know there is a link between job model and job policy. */
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

// Auth
/* Registered User Controller first then action which I'm going to call create cause I'm creating a 
new user. -> */
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
/* login - cause we're creating new session */
/* Named Route: login. */
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
/* If click log out that will hit the destroy method on the session controller */
Route::post('/logout', [SessionController::class, 'destroy']);

// GET - getting a page
// POST - submitting a form -> stores data in a database
/* Patch and delete cannot be recognised directly by browser like GET and POST can be, so will need 
blade directive */
// PATCH - updating a resource
// DELETE - deleting a resource 