<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Theme;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function category($themeCode)
    {
        $theme = Theme::query()
            ->where('code', $themeCode);

        $posts = Post::query()
            ->where('theme_id', '=', $theme->value('id'))
            ->orderBy('created_at', 'desc')
            ->paginate(3);
        return view('themes.index', [
            'posts' => $posts,
            'theme' => $theme
        ]);
    }

    public function categories()
    {
        $themes = Theme::query()
            ->where('level', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        return view('themes.index',[
            'themes' => $themes
        ]);
    }

    public function showPost($id)
    {
        $post = Post::findOrFail($id);
        return view('post', [
            'post' => $post
        ]);
    }
}
