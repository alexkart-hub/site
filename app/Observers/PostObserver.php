<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class PostObserver
{
    public function created()
    {
        Cache::forget('all_posts');
        Cache::forget('last_post');
    }
}
