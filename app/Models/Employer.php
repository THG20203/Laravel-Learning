<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employer extends Model
{
    use HasFactory;

    public function jobs()
    {
        /* employer can sign up and create many jobs, so hasMany(Job) */
        return $this->hasMany(Job::class);
    }

    /* Job belongs to an employer AND THEN here in employer, an employer belongs to a 
    user */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

/* $employer->job Employer object will return jobs, going to return a collection.
This is because it has one or many jobs that are associated with it. */
