<?php

namespace App\Models;

class Job
{
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
    public static function find(int $id)
    {
    }
}
