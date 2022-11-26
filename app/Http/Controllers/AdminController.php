<?php

namespace App\Http\Controllers;

use App\Pages\PageFactory;
use Illuminate\Support\Facades\Route;

class AdminController extends Controller
{

    protected $page;

    public function __construct()
    {
        $this->page = (new PageFactory(Route::currentRouteName()))->getPage();
    }
}
