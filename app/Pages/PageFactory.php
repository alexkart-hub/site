<?php

namespace App\Pages;

use Illuminate\Support\Facades\Route;

class PageFactory
{
    private $page;

    public function __construct()
    {
        $class = '\App\Pages\Web\\' . ucfirst(Route::currentRouteName()) . 'Page';
        if (!class_exists($class)) {
            abort(404);
        }
        $this->page = new $class();
    }

    public function getPage()
    {
        return $this->page;
    }
}
