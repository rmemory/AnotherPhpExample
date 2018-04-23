<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function($view) {
            // These should be cached so they aren't queried 
            // each time. Need some form of notification if 
            // they have changed ... events probably.
            $archive = \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');
            $view->with(compact (['archives','tags']));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
