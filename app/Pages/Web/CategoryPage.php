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
        $this->category = Category::query()
            ->where('code', $categoryCode)
            ->first();
        if (!$this->category) {
            abort(404);
        }

        $this->categories = Category::query()
            ->where('level', $this->category->level + 1)
            ->where('parent_id', $this->category->id)
            ->orderBy('created_at', 'desc')
            ->paginate(self::CATEGORIES_ON_PAGE);

        $this->posts = Post::query()
            ->where('category_id', '=', $this->category->id)
            ->where('is_published', '1')
            ->orderBy('created_at', 'desc')
            ->paginate(self::POSTS_ON_PAGE);
    }

    protected function setMeta()
    {
        $this->title = $this->category->title;
        $this->description = $this->category->description;
    }
}
