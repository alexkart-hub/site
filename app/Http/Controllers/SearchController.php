<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends WebController
{
    public function index(Request $request)
    {
        $this->page
            ->setQuery($request->get('query'))
            ->setResult();
        return view($this->page->getView(), $this->page->getData());
    }
}
