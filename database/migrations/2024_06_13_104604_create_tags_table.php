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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            // Initially a name should be fine
            $table->string("name");
            $table->timestamps();
        });
        /* We have a jobs table, a tags table; in between we need a connecting table.
        This is our pivot table. In here, could store the tag id as well as the job id. */
        Schema::create('job_tag', function (Blueprint $table) {
            $table->id();
            /* handle our job id column */
            $table->foreignIdFor(\App\Models\Job::class);
            /* handle our tag id column */
            $table->foreignIdFor(\App\Models\Tag::class);
            /* when create a new record in pivot table, would I like to track the time stamp 
            for when that happened */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};

/* Pivot table:
Allows users to reorganize, summarize, and analyze large datasets in a tabular format without 
altering the original data. */
/* This functionality is essential for spotting trends, making comparisons, and discovering 
patterns in data, making pivot tables a powerful tool for quick data analysis and reporting. */