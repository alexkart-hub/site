<?php

namespace App\Http\Controllers;

use App\Pages\PageFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class WebController extends Controller
{

    protected $page;

    public function __construct()
    {
        $this->page = (new PageFactory())->getPage();
    }
}
