<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\CommentController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

//this route exists for testing purposes
Route::get('/current/url', function() {
  return URL::current();
});

Route::get('/homeurl', function() {
  return URL::to('/');
});

Route::get('/', function() {
  return view('homepage');
});

Route::get('/signup', function() {
  return view('signup');
});

Route::get('/login', function() {
  return view('login');
});

Route::get('users', [UserController::class, 'index']);
Route::get('user/{id}', [UserController::class, 'show']);

Route::get('user_page/{id}', [UserPageController::class, 'show']);
Route::get('user_pages', [UserPageController::class, 'index']);

Route::get('post/{id}', [PostController::class, 'show']);
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('posts_per_user/{user_id}', [PostController::class, 'show_per_user']);

Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
Route::get('comments/create/post/{post_id}', [CommentController::class, 'create'])->name('comments.create');
Route::post('comments/store/user/{user_id}/post/{post_id}', [CommentController::class, 'store'])->name('comments.store');
Route::get('comment/{id}', [CommentController::class, 'show'])->name('comments.show');
Route::get('comments_per_post/{post_id}', [CommentController::class, 'show_per_post'])->name('comments_per_post');
Route::get('comments_per_user/{user_id}', [CommentController::class, 'show_per_user'])->name('comments_per_user');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
