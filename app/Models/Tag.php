<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    // Related pivot key mention when model name convention exists.
    public function jobs() {
        // $tag->jobs;
        return $this->belongsToMany(Job::class, relatedPivotKey: 'job_listing_id');
    }

    public function posts() {
        // $tag->posts;
        return $this->belongsToMany(Post::class);
    }
}
