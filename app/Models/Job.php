<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $table = "job_listings";

    /* add property to job class called fillable - represents all of the attributes that 
    are able to be mass assigned (and those attributes ALONE). */
    protected $fillable = ['title', 'salary'];

    // employer method - if have a job and need information about the employer
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    // method to access all the tags for job
    public function tags()
    {
        /* foreignPivotKey is overwriting the foreignPivotKey being set at NULL */
        return $this->belongsToMany(Job::class, foreignPivotKey: "job_listing_id");
    }
}

/* Model is a key term, comes from the MVC arcitecture. Model, View, Controller.
MVC = system for applications. Its how each piece of puzzle should communicate. 
    
Models - Represent data persistence, business logic tier of application
Views - Presentation layer
Controller - Defining a route then have a function that handles that route? */