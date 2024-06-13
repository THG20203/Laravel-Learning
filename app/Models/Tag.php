<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function jobs()
    {
        /* foreignPivotKey is overwriting the foreignPivotKey being set at NULL */
        return $this->belongsToMany(Job::class, foreignPivotKey: "job_listing_id");
    }
}
