<?php

namespace App\Pages\Web;

use App\Models\Category;
use App\Pages\Page;

class CategoriesPage extends Page
{
    const CATEGORIES_ON_PAGE = 12;
    public $categories;

    protected function init()
    {
        $this->categories = Category::query()
            ->where('level', 1)
            ->orderBy('margin_left')
            ->paginate(self::CATEGORIES_ON_PAGE);
    }

    protected function setMeta()
    {
        $this->title = 'Список тем';
        $this->description = 'Список тем';
    }
}
