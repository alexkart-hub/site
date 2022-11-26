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
        $category = Category::query()
            ->where('code', $categoryCode)
            ->first();

        $posts = Post::query()
            ->where('category_id', '=', $category->id)
            ->orderBy('created_at', 'desc')
            ->get(['code', 'title'])->toArray();
        $postsCodes = array_column($posts, 'code');
        $postsCodesKeys = array_flip($postsCodes);

        $post = Post::query()
            ->where('code', $postCode)
            ->first();

        $this->data = [
            'post' => $post,
            'curCategory' => $category,
            'postPrev' => $posts[$postsCodesKeys[$postCode] - 1] ?? '',
            'postNext' => $posts[$postsCodesKeys[$postCode] + 1] ?? '',
        ];
    }
}
