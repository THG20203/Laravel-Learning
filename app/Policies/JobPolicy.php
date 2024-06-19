<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    /**
     * Determine whether the user can edit any models. This accepts the user and the job.
     * So policies are almost like a version of a gate, sort of the same thing, just an interface for it.
     * bool because its going to return a boolean value like Gate definition so I'm adding bool return type
     */
    public function edit(User $user, Job $job): bool
    {
        return $job->employer->user->is($user);
    }
}

/* Policies - connected to eloquent models */