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
        /* */

        /* now can reference that logic to authorie user - providing the name 'edit-job' and then the $job (job variable) we 
        are referring to. */
        /* The authorize method will run the logic associated with the name I reference (i.e. 'edit-job'). If it fails/ returns
        false, laravel automatically aborts with a 403. */
        //       Gate::authorize('edit-job', $job);

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