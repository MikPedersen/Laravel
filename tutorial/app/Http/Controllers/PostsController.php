<?php


namespace App\Http\Controllers;

use DB;
use App\Models\Post;


class PostsController
{
    public function show($slug)
    {
        return view('post', [
            //hent post fra DB eller lav en fejl besked hvis den ikke findes
                'post' => Post::where('slug', $slug)->firstOrFail()
            ]);
        }

}
