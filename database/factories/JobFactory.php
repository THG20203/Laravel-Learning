<?php

namespace Database\Factories;

/* you've defined a JobFactory class in the Database\Factories namespace and you're extending Laravel's 
built-in Factory class to create a factory for the Job model. You use 'use App\Models\Employer;' at the 
top of your file to bring the Employer model into the scope of your factory.  */

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->jobTitle(),
            /* need to update JobFactory to include employer_id. Employer factory - whenever you generate a job, 
            I would also like you to generate corrresponding relationships with employer factory. So need to generate
            that, persist it in the database then use that as corresponding employer id. */
            "employer_id" => Employer::factory(),
            // in situations where it doesn't matter -> can hard code a value like for salary
            "salary" => "$50,000 USD"
        ];
    }
}
