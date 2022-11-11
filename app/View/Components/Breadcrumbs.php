<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Post;
use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    protected $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route)
    {
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcrumbs', ['breadcrumbs' => $this->getBreadcrumbs()]);
    }

    public function getBreadcrumbs()
    {
        $breadcrumbs = [];
        $breadcrumbs[] = new Crumb(route('home'), 'Главная', $this->route->getName() == 'home');
        if (in_array($this->route->getName(), ['categories', 'category', 'post'])) {
            $breadcrumbs[] = new Crumb(route('categories'), 'Список тем', $this->route->getName() == 'categories');
        }
        foreach ($this->route->parameters as $param => $value) {
            $crumb = $this->getBreadcrumbItem($param, $value);
            if (is_array($crumb)) {
                foreach ($crumb as $item) {
                    $breadcrumbs[] = $item;
                }
            } else {
                $breadcrumbs[] = $crumb;
            }
        }
        return $breadcrumbs;
    }

    protected function getBreadcrumbItem($name, $value)
    {
        $method = 'get' . $name;
        if (method_exists($this, $method)) {
            return $this->$method($value);
        }
        return false;
    }

    protected function getCategoryCode($value)
    {
        $category = Category::query()
            ->where('code', $value)
            ->first();
        if ($category->level > 1) {
            $arCategories[] = $category;
            $level = $category->level;
            while ($level > 1) {
                $category = Category::findOrFail($category->parent_id);
                $level = $category->level;
                $arCategories[] = $category;
            }
            $arCategories = array_reverse($arCategories);
            $breadcrumbs = [];
            foreach ($arCategories as $category) {
                $active = ($category->code == $value && $this->route->getName() == 'category');
                $breadcrumbs[] = new Crumb(route('category', ['categoryCode' => $category->code]), $category->name, $active);
            }
            return $breadcrumbs;
        } else {
            return new Crumb(route('category', ['categoryCode' => $value]), $category->name, $this->route->getName() == 'category');
        }
    }

    protected function getPostCode($value)
    {
        $post = Post::query()
            ->where('code', $value)
            ->first();
        return new Crumb(route('post', ['categoryCode' => $post->category->code, 'postCode' => $value]), $post->title, $this->route->getName() == 'post');
    }
}

class Crumb
{
    public $link;
    public $title;
    public $active;

    public function __construct($link, $title, $active = false)
    {
        $this->link = $link;
        $this->title = $title;
        $this->active = $active;
    }
}
