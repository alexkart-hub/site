<?php

namespace App\Pages;

use Illuminate\Support\Facades\Route;

class Page implements WebPage
{
    protected $view;
    protected $data;
    protected $route;

    public function __construct()
    {
        $this->route = Route::current();
        $this->view = $this->route->getName() . '.index';
        $this->init();
    }

    public function getData()
    {
        return $this->data;
    }

    public function getDescription()
    {
        // TODO: Implement getDescription() method.
    }

    public function getTitle()
    {
        // TODO: Implement getTitle() method.
    }

    public function getView()
    {
        return $this->view;
    }
}
