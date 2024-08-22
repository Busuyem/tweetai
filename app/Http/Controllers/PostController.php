<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return $post;
    }

    public function comments(Post $post)
    {
        return $post->comments()->paginate(10);
    }
}
