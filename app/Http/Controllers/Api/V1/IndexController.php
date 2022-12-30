<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ApiPostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {
        return 'Hello, world!';
    }

    public function allPosts()
    {
        return new PostCollection(Cache::remember('all_posts', 60 * 60 * 24 , function () {
            return Post::all();
        }));
    }

    public function lastPost()
    {
        return new PostResource(Cache::remember('last_post', 60 * 60 * 24, function () {
            return Post::orderByDesc('created_at')->first();
        }));
    }

    public function createPost(ApiPostRequest $request)
    {
        PostService::createPost($request);
        return new PostResource(Cache::remember('last_post', 60 * 60 * 24, function () {
            return Post::orderByDesc('created_at')->first();
        }));
    }
}
