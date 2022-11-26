<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends WebController
{
    public function index()
    {
        return view($this->page->getView(), $this->page->getData());
    }
}
