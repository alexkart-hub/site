<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function category($categoryCode)
    {
        $category = Category::query()
            ->where('code', $categoryCode);

        $posts = Post::query()
            ->where('category_id', '=', $category->value('id'))
            ->orderBy('created_at', 'desc')
            ->paginate(3);
        return view('categories.category.index', [
            'posts' => $posts,
            'category' => $category
        ]);
    }

    public function categories()
    {
        $categories = Category::query()
            ->where('level', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(12);
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
