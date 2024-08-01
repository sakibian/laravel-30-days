<?php

namespace App\Models;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Job extends Model {

    use HasFactory;
    protected $table = "job_listings";

    // protected $fillable = ['title', 'salary', 'employer_id'];

    // To disable fillable
    protected $guarded = [];

    public function employer() {
        return $this->belongsTo(Employer::class);
    }

    public function tags() {
        // $job->tags;
        // foreignPivotKey: 'job_listing_id'
        // Something to mind of when default model name is exist like Job, JobListing
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }

    // public static function all(): array {
    //     return [
    //         [
    //             "id" => 1,
    //             "title" => "Director",
    //             "salary" => "$50.000"
    //         ],
    //         [
    //             "id" => 2,
    //             "title" => "Programmer",
    //             "salary" => "$10.000"
    //         ],
    //         [
    //             "id" => 3,
    //             "title" => "Teacher",
    //             "salary" => "$40.000"
    //         ]
    //     ];
    // }

    // public static function find(int $id): array {
        // longer
        // Arr::first($jobs, function($job) use ($id) {
        //     return $job['id'] = $id;
        // });

        // Shorter (Scoping)
        // $job = Arr::first(Job::all(), fn($job) => $job['id'] == $id);
        // dd($job);
    //     $job =  Arr::first(static::all(), fn($job) => $job['id'] == $id);

    //     if(!$job) {
    //         abort(404);
    //     }

    //     return $job;
    // }
}