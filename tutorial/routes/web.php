<?php

use App\Http\Controllers\ConversationController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserNotificationsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactController;

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

Route::get('/posts/{post}', [PostsController::class, 'show']);

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
Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');

//Gemmer vores artikel i DB
Route::post('/articles', [ArticlesController::class, 'store']);

//Opret en artikel
Route::get('/articles/create', [ArticlesController::class, 'create']);

//viser en specific article
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');

//viser en specific article ud fra url'ens id
Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit']);

//Gemmer den opdaterede artikel i DB
Route::put('/articles/{article}', [ArticlesController::class, 'update']);

Route::get('/contact', [ContactController::class, 'show']);
Route::post('/contact', [ContactController::class, 'store']);



//CRUD for articles
//Post /articles - Create new
//Get /articles - Read
//Get /articles/:id - Read specific
//PUT /articles/:id - update
//Delete /articles/:id - delete

//Crud eksempel for videos
//Get /videos
//Get /videos/create
//Post /videos
//Get /videos/2
//Get /videos/2/edit
//Put /videos/2
//Delete /videos/2

//Get /videos/subscribe - hvis man vil lave en subscription option

//Post /videos/subscriptions => VideoSubscriptionsController@store // Husk dette er laravel 6

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('payments/create', [PaymentsController::class, 'create'])->middleware('auth');
Route::post('payments', [PaymentsController::class, 'store'])->middleware('auth');

Route::get('notifications', [UserNotificationsController::class, 'show'])->middleware('auth');

Route::get('conversations', [ConversationController::class, 'index']);
Route::get('conversations/{conversation}', [ConversationController::class, 'show']);

Route::post('best-replies/{reply}', [ReplyController::class, 'store']);
