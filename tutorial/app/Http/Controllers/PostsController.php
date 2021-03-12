<?php


namespace App\Http\Controllers;

class PostsController
{
    public function show($post)
    {
            $posts = [
                'my-first-post' => 'Hello this is my first blog post!',
                'my-second-post' => 'Now I am getting the hang of this blogging thing.'
            ];
            // i tilfælde af manglende post
            if (!array_key_exists($post, $posts)) {
                abort(404, 'Sorry that post was not found');
            }

            return view('post', [
                'post' => $posts[$post]
            ]);
        }

}
