<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('comments_per_post/{post_id}', [CommentController::class, 'api_show_per_post'])->name('api.comments_per_post');
Route::post('comments/store/user/{user_id}/post/{post_id}', [CommentController::class, 'api_store'])->name('api.comments.store');
Route::post('comments/authors/{post_id}', [CommentController::class, 'api_get_authors'])->name('api.comments.get_authors');
