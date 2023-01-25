<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class LeftMenu extends Component
{
    public $menu;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setMenu();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.left-menu');
    }

    protected function setMenu()
    {
        $this->menu = [
            [
                'title' => 'Заметки',
                'items' => [
                    ['title' => 'Все заметки', 'routeName' => 'admin.posts.index'],
                    ['title' => 'Разделы', 'routeName' => 'admin.categories.index'],
                    ['title' => 'Тэги', 'routeName' => 'admin.tags.index'],
                ]
            ]
        ];
    }
}
