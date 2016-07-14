<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        view()->composer(
            'posts.index', 'App\Http\ViewComposers\PostsComposer'
        );

        view()->composer(
            'posts.page', 'App\Http\ViewComposers\PostComposer'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}