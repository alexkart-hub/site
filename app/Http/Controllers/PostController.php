<?php

namespace App\Http\Controllers;

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
        return view('categories.index',[
            'categories' => $categories
        ]);
    }

    public function showPost($id)
    {
        $post = Post::findOrFail($id);
        return view('post', [
            'post' => $post
        ]);
    }
}
