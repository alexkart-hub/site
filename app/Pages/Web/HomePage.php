<?php

namespace App\Pages\Web;

use App\Models\Category;
use App\Pages\Page;

class HomePage extends Page
{
    public $categories;

    protected function init()
    {
        $this->categories = Category::query()
            ->where('level', 1)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    protected function setMeta()
    {
        $this->title = 'Главная страница';
        $this->description = 'Собираю на этом сайте всю информацию, которая мне нужна.';
    }
}
