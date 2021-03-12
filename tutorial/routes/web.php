<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// vi bruger test viewet og viser hvad brugeren har skrevet i url, desuden har vi brugt inline som svarer til Lambda i java.
Route::get('/test', function () {
    return view('test', [
        'name' => request('name')
    ]);
});
// ny route der tager et wildcard {post} og henter fra dummy data
Route::get('/posts/{post}', function ($post) {
    $posts = [
        'my-first-post' => 'Hello this is my first blog post!',
        'my-second-post' => 'Now I am getting the hang of this blogging thing.'
    ];
    // i tilfælde af manglende post
    if (! array_key_exists($post, $posts)){
        abort(404, 'Sorry that post was not found');
    }
    return view('post', [
        'post' => $posts[$post]
    ]);
});
