<?php

namespace App\Http\Controllers;

// importing the job class
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            /* Whilst I haven't done authentication, will hard code an employer. */
            'employer_id' => 1,
        ]);

        /* after finishing entering the form would be good to redirect to the jobs page */
        return redirect("/jobs");
    }
    public function edit(Job $job)
    {
        // GATE AUTHORISED CONTENT
        /* Use Gate facade - conditionally allow entry if you meet certain criteria, if you are
        authorised that gate will open, but if you are unauthorised the gate is locked. */
        /* First: Given Gate the name edit-job. */
        /* Second: PAss a function that will accept the signed in user, as well as the job we are authorising. */
        Gate::define('edit-job', function (User $user, Job $job) {
            /* within here we should return a boolean, indicates whether or not user is authorised to edit that 
            job. */
            /* return if the employer user IS the currently signed in user. Simpler to just to return this as the true value
            in the Gate boolean */
            return $job->employer->user->is($user);
        });

        /* Explanation of the logic above (for understanding) - taking logic and extracting it into its own gate. The gate
        is called edit-job and the logic for whether you can edit a job is look at the user responsible for the job 
        (the user-> section) and see if that 'user' is the same as the user that is currently signed in, (which we get from 
        (User $user) */

        // IF NOT SIGNED IN
        /* to edit job, should be signed in so going to check if you're a guest, if so redirect you 
        to the login page. */
        if (Auth::guest()) {
            return redirect('/login');
        }

        /* now can reference that logic to authorie user - providing the name 'edit-job' and then the $job (job variable) we 
        are referring to. */
        /* The authorize method will run the logic associated with the name I reference (i.e. 'edit-job'). If it fails/ returns
        false, laravel automatically aborts with a 403. */
        Gate::authorize('edit-job', $job);

        /* If the user who created this job is not the person who is currently signed in, then you don't 
        have authorisation. */
        return view('jobs.edit', ['job' => $job]);
    }

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