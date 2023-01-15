<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostService;

class PostController extends Controller
{
    protected PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $posts = Post::query()
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $categories = Category::query()
            ->orderBy('margin_left', 'asc')
            ->get();
        return view('admin.posts.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostFormRequest $request
     */
    public function store(PostFormRequest $request)
    {
        $this->postService->create($request);
        return redirect(route('admin.posts.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::query()
            ->orderBy('margin_left', 'asc')
            ->get();
        return view('admin.posts.create', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostFormRequest $request
     * @param int $id
     */
    public function update(PostFormRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $data = $request->validated();
        if ($request->has('thumbnail')) {
            $thumbnail = str_replace('public/posts/', '', $request->file('thumbnail')->store('public/posts'));
            $data['thumbnail'] = $thumbnail;
        }
        $data['is_published'] = isset($data['is_published']);
        $post->update($data);
        return redirect(route('admin.posts.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect(route('admin.posts.index'));
    }
}
