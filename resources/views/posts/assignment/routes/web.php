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
Route::get('posts', [PostController::class, 'index']);
Route::get('posts_per_user/{user_id}', [PostController::class, 'show_per_user']);

Route::get('comments', [CommentController::class, 'index']);
Route::get('comment/{id}', [CommentController::class, 'show']);
Route::get('comments_per_post/{post_id}', [CommentController::class, 'show_per_post']);
Route::get('comments_per_user/{user_id}', [CommentController::class, 'show_per_user']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
