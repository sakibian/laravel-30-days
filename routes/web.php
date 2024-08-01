<?php

use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Post;
use App\Models\User;


Route::get('/', function () {
    return view('home', [
        "users" => User::all()
    ]);
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(10);
    // $jobs = Job::with('employer')->get();
    // $jobs = Job::all();
    return view('jobs.index', [
        "jobs" => $jobs,
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view("jobs.show", ["job" => $job]);
});

Route::post('/jobs', function () {
    // return view('jobs.create');
    // dd(request('title'));

    // Skipped validation

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/posts', function () {
    $posts = Post::with('comments')->paginate(10);
    // $posts = Post::with('comments')->get();
    // $posts = Post::all();
    return view('posts', [
        "posts" => $posts
    ]);
});

Route::get('/posts/{id}', function ($id) {
    $post = Post::findOrFail($id);
    $comments = $post->comments;
    return view("post", [ "post" => $post, 'comments' => $comments ]);
});

Route::get('/contact', function () {
    return view("contact");
});

Route::get('/team', function () {
    return view("team");
});