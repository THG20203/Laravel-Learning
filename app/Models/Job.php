<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    /* return type of array */
    public static function all(): array
    {
        return [
            [
                "id" => 1,
                "title" => "Director",
                "salary" => "$50,000"
            ],
            [
                "id" => 2,
                "title" => "Programmer",
                "salary" => "$10,000"
            ],
            [
                "id" => 3,
                "title" => "Teacher",
                "salary" => "$40,000"
            ]
        ];
    }
    /* new method - call it find. Want to find a specific job with an id (and that id should be an integar). */
    public static function find(int $id): array
    {
        /* we're already in job class above so could just say static::all */
        $job = Arr::first(static::all(), fn ($job) => $job["id"] == $id);

        if (!$job) {
            abort(404);
        }

        return $job;
    }

    /* Model is a key term, comes from the MVC arcitecture. Model, View, Controller.
    MVC = system for applications. Its how each piece of puzzle should communicate. 
    
    Models - Represent data persistence, business logic tier of application
    Views - Presentation layer
    Controller - Defining a route then have a function that handles that route? */
}
