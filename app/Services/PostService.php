<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;

class PostService
{
    public static function createPost(Request $request)
    {
        Post::create($request->validated());
    }
}
