<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentForm;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    const CATEGORIES_ON_PAGE = 12;

    public function category($categoryCode)
    {
        $category = Category::query()
            ->where('code', $categoryCode);

        $categories = Category::query()
            ->where('level', $category->value('level') + 1)
            ->where('parent_id', $category->value('id'))
            ->orderBy('created_at', 'desc')
            ->paginate(self::CATEGORIES_ON_PAGE);

        $posts = Post::query()
            ->where('category_id', '=', $category->value('id'))
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('categories.category.index', [
            'posts' => $posts,
            'curCategory' => $category,
            'categories' => $categories
        ]);
    }

    public function categories()
    {
        $categories = Category::query()
            ->where('level', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(self::CATEGORIES_ON_PAGE);
        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function showPost($categoryCode, $postCode)
    {
        $category = Category::query()
            ->where('code', $categoryCode);

        $posts = Post::query()
            ->where('category_id', '=', $category->value('id'))
            ->orderBy('created_at', 'desc')
            ->get(['code', 'title'])->toArray();
        $postsCodes = array_column($posts, 'code');
        $postsCodesKeys = array_flip($postsCodes);

        $post = Post::query()
            ->where('code', $postCode)
            ->first();

        return view('posts.post.index', [
            'post' => $post,
            'curCategory' => $category,
            'postPrev' => $posts[$postsCodesKeys[$postCode] - 1] ?? '',
            'postNext' => $posts[$postsCodesKeys[$postCode] + 1] ?? '',
        ]);
    }

    public function comment($postId, CommentForm $request)
    {
        $post = Post::findOrFail($postId);
        $category = Category::findOrFail($post->category_id);
        $post->comments()->create($request->validated());
        return redirect(route('post', ['categoryCode' => $category->code, 'postCode' => $post->code]));
    }
}
