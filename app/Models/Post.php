<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function tags() {
        // $post->tags;
        return $this->belongsToMany(Tag::class);
    }

    public function comments() {
        // $post->comments;
        return $this->hasMany(Comment::class);
    }

    public function post() {
        // $post->users;
        return $this->belongsTo(User::class);
    }
}
