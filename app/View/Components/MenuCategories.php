<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class MenuCategories extends Component
{
    public $curCategory;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($curCategory)
    {
        $this->curCategory = $curCategory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $categories = Category::all()
        ->sortBy('margin_left');
        return view('components.menu-categories', ['categories' => $categories]);
    }
}
