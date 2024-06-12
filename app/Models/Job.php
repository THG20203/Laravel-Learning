<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = "job_listings";

    /* add property to job class called fillable - represents all of the attributes that 
    are able to be mass assigned (and those attributes ALONE). */
    protected $fillable = ['title', 'salary'];
}

/* Model is a key term, comes from the MVC arcitecture. Model, View, Controller.
MVC = system for applications. Its how each piece of puzzle should communicate. 
    
Models - Represent data persistence, business logic tier of application
Views - Presentation layer
Controller - Defining a route then have a function that handles that route? */