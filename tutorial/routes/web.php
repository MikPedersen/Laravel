<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ArticlesController;
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

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    //Hent alle artikler fra DB og sorter seneste først
    return view('about', [
        'articles' => App\Models\Article::take(3)->latest()->get()
    ]);
});
// vi bruger test viewet og viser hvad brugeren har skrevet i url, desuden har vi brugt inline som svarer til Lambda i java.
Route::get('/test', function () {
    return view('test', [
        'name' => request('name')
    ]);
});

//Viser article siden fra menuen
Route::get('/articles', [ArticlesController::class, 'index']);
//viser en specific article
Route::get('/articles/{article}', [ArticlesController::class, 'show']);

Route::get('/posts/{post}', [PostsController::class, 'show']);
