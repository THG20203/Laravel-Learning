<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /* boot method = triggered after all the project dependencies are loaded */
        Model::preventLazyLoading();

        /* Moving Gate logic into appserviceprovider because good to define simple bits of authorisation 
        here that can be referenced anywhere within my application. */

        /* (User $user, Job $job) */
        /* User object that laravel passes into my closure will always reference currently authenticated user.
        But, what about when I'm a guest and I'm not signed in. In those cases, the gate will always fail. You 
        will never be authorised, you'll never hit the return logic, will just immediately return false.  */

        // GATE AUTHORISED CONTENT
        /* Use Gate facade - conditionally allow entry if you meet certain criteria, if you are
        authorised that gate will open, but if you are unauthorised the gate is locked. */
        /* First: Given Gate the name edit-job. */
        /* Second: Pass a function that will accept the signed in user, as well as the job we are authorising. */
        Gate::define('edit-job', function (User $user, Job $job) {
            /* within here we should return a boolean, indicates whether or not user is authorised to edit that 
            job. */
            /* return if the employer user IS the currently signed in user. Simpler to just to return this as the true value
            in the Gate boolean */
            return $job->employer->user->is($user);
        });
    }
}

/* Explanation of the Gate::Define logic above (for understanding) - taking logic and extracting it into its own gate. 
The gate is called edit-job and the logic for whether you can edit a job is look at the user responsible for the job 
(the user-> section) and see if that 'user' is the same as the user that is currently signed in, (which we get from 
(User $user) */
