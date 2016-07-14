<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

use \App\Post;

class PostComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        post = Post::findOrFail($id);

        $view->with(['post' => $post]);
    }
}