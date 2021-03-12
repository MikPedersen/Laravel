<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
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

Route::get('/posts/{post}', [PostsController::class, 'show']);
