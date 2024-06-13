<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    public function jobs()
    {
        /* employer can sign up and create many jobs, so hasMany(Job) */
        return $this->hasMany(Job::class);
    }
}

/* $employer->job Employer object will return jobs, going to return a collection.
This is because it has one or many jobs that are associated with it. */
