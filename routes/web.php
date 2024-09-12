<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;


Route::view('/', 'home');
Route::view('/team', 'team');
Route::view('/contact', 'contact');
Route::resource('jobs', JobController::class)->only(['index', 'show']);
Route::resource('jobs', JobController::class)->except(['store', 'delete'])->middleware('auth');
// Time Pause
// 5:40:05sc

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/posts', function () {
    $posts = Post::with('comments')->latest()->simplePaginate(10);
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

