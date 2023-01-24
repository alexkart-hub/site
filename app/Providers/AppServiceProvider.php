<?php

namespace App\Providers;

use App\Http\Controllers\IndexController;
use App\Services\PostService;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PostService::class, function () {
            return new PostService();
        });
        $this->app->singleton(IndexController::class, function () {
            return new IndexController(
                $this->app->get(PostService::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::enforceMorphMap([
            'post' => 'App\Models\Post'
        ]);
    }
}
