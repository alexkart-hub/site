<?php

namespace App\Pages\Web;

use App\Models\Category;
use App\Pages\Page;

class CategoriesPage extends Page
{
    const CATEGORIES_ON_PAGE = 12;

    protected function init()
    {
        $categories = Category::query()
            ->where('level', 1)
            ->orderBy('margin_left')
            ->paginate(self::CATEGORIES_ON_PAGE);
        $this->data = [
            'categories' => $categories
        ];
    }
}
