<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;

class PostService
{
    public function create(Request $request)
    {
        $result = Post::create($request->validated());
        Post::getElastic()
            ->setData($result)
            ->post($request->validated());
    }
}
