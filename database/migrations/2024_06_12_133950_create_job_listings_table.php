<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            /* foreign id called employer_id - for every job listing theres an employer_id (points to corresponding employer) */
            // unsigned BigIntegar one way to do it:
            // $table->unsignedBigIntegar("employer_id"); // unsigned means non-negative values and bigintegar means very large numbers
            // another way of doing it:
            $table->foreignIdFor(\App\Models\Employer::class);
            /* defining the blueprint for table */
            $table->string("title");
            $table->string("salary");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
