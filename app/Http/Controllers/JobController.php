<?php

namespace App\Http\Controllers;

// importing the job class
use App\Models\Job;
use App\Models\User;
use App\Mail\JobPosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller

{
    public function index()
    {
        /* want to see the most recently create job first. hence adding latest() method. Adds an order by clause
        to SQL query. */
        /* for first argument can specify how many records do we want to show per page */
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        return view('jobs.index', ["jobs" => $jobs]);
    }
    public function create()
    {
        return view('jobs.create');
    }
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }
    public function store()
    {
        request()->validate([
            /* provide an array of attributes that need validation */
            "title" => ["required", "min:3"],
            "salary" => ["required"],
        ]);

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            /* Whilst I haven't done authentication, will hard code an employer. */
            'employer_id' => 1,
        ]);

        /* after we publish new job, can deliver that email. But should send the email to the person who created
        the job. that should go in the argument list */
        /* Created a $job variable above to store jobs created. Remember a job belongs to an employer, employer 
        belongs to a user (and an user has an email but laravel is clever enough to work that out). */
        /* Changed the send method to queue. So don't delete the email as part of the current request, instead
        throw it onto a queue. */
        Mail::to($job->employer->user)->queue(
            new JobPosted($job)
        );

        /* after finishing entering the form would be good to redirect to the jobs page */
        return redirect("/jobs");
    }
    public function edit(Job $job)
    {
        /* If the user who created this job is not the person who is currently signed in, then you don't 
        have authorisation. */
        return view('jobs.edit', ['job' => $job]);
    }

    /* test of statistics image */

    public function update(Job $job)
    {
        // validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
        // update job 
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
        // and persist
        // redirect
        // '/jobs/' . $job->id concatenates these to form a single string URL.
        return redirect('/jobs/' . $job->id);
    }
    public function destroy(Job $job)
    {
        //authorize (On hold...)
        $job->delete();
        // redirect - send you back to index job view, showing all the jobs
        return redirect('/jobs');
    }
}

/* $model->is() theory:
Determine if two models have the same ID and belong to the same table. 
Is the user instance the same as the user who is currently signed in. 
hence user->is(Auth::user()) */