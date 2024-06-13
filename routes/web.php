<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    // Eager load jobs with the employer for each one

    /* Job::with('employer'): This line tells Eloquent to prepare a query that will retrieve Job 
    models and, at the same time, load the associated employer relationships. The employer is 
    expected to be a defined relationship (like belongsTo or hasOne) in the Job model class. */

    /* ->get(): This method executes the query and retrieves the results. It fetches all records 
    from the jobs table and their related employer data in one go, rather than querying for the 
    employer each time a job is accessed, which would happen in lazy loading. */

    $jobs = Job::with('employer')->get();

    return view('jobs', ["jobs" => $jobs]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
