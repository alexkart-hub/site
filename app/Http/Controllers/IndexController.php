<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $themes = Category::query()
            ->where('level', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(2);
        return view('main.index',[
            'categories' => $themes
        ]);
    }
}
