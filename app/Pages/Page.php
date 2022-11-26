<?php

namespace App\Pages;

use Illuminate\Support\Facades\Route;

class Page implements WebPage
{
    protected $view;
    protected $data;
    protected $route;
    protected $title;
    protected $description;

    public function __construct()
    {
        $this->route = Route::current();
        $this->view = $this->route->getName() . '.index';
        $this->init();
        $this->setData();
        $this->setMeta();
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getView()
    {
        return $this->view;
    }

    public function getData()
    {
        return $this->data;
    }

    protected function setMeta()
    {
        $this->title = '';
        $this->description = '';
    }

    protected function setData()
    {
        $this->data = [
            'page' => $this
        ];
    }

    protected function init()
    {
    }
}
