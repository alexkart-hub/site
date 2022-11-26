<?php

namespace App\Pages\Web;

use App\Models\Category;
use App\Models\Post;
use App\Pages\Page;

class PostPage extends Page
{
    protected function init()
    {
        $this->view = 'posts.' . $this->route->getName() . '.index';
        $categoryCode = $this->route->parameter('categoryCode');
        $postCode = $this->route->parameter('postCode');
        $this->category = Category::query()
            ->where('code', $categoryCode)
            ->first();

        $this->posts = Post::query()
            ->where('category_id', '=', $this->category->id)
            ->orderBy('created_at', 'desc')
            ->get(['code', 'title'])->toArray();
        $postsCodes = array_column($this->posts, 'code');
        $postsCodesKeys = array_flip($postsCodes);

        $this->post = Post::query()
            ->where('code', $postCode)
            ->first();
        $this->postPrev = $posts[$postsCodesKeys[$postCode] - 1] ?? '';
        $this->postNext = $posts[$postsCodesKeys[$postCode] + 1] ?? '';
    }

    protected function setMeta()
    {
        $this->title = $this->post->title;
        $this->description = $this->post->preview_text;
    }
}
