<?php

namespace App\Pages\Web;

use App\Models\Category;
use App\Models\Post;
use App\Pages\Page;

class CategoryPage extends Page
{
    const CATEGORIES_ON_PAGE = 12;
    const POSTS_ON_PAGE = 20;

    protected function init()
    {
        $this->view = 'categories.' . $this->route->getName() . '.index';
        $categoryCode = $this->route->parameter('categoryCode');
        $category = Category::query()
            ->where('code', $categoryCode)
            ->first();

        $categories = Category::query()
            ->where('level', $category->level + 1)
            ->where('parent_id', $category->id)
            ->orderBy('created_at', 'desc')
            ->paginate(self::CATEGORIES_ON_PAGE);

        $posts = Post::query()
            ->where('category_id', '=', $category->id)
            ->where('is_published', '1')
            ->orderBy('created_at', 'desc')
            ->paginate(self::POSTS_ON_PAGE);

        $this->data = [
            'posts' => $posts,
            'curCategory' => $category,
            'categories' => $categories
        ];
    }
}
