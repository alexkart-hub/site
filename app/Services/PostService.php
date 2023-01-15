<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;

class PostService
{
    public function create(Request $request)
    {
        $data = $request->validated();
        $data['is_published'] = isset($data['is_published']);
        $data['preview_text'] = $data['preview_text'] ?? '';
        $result = Post::create($data);
        Post::getElastic()
            ->setData($result)
            ->post($request->validated());
    }
}
