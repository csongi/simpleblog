<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

use \App\Post;
use Request;

class PostsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $posts = Post::paginate(9);

        if (Request::has('search')) {
            $posts = Post::where('title', 'like', '%'. Request::input('search') .'%')
                ->orWhere('content', 'like', '%'. Request::input('search') .'%')->paginate(9);
        }

        $view->with(['posts' => $posts, 'search' => Request::input('search')]);
    }
}