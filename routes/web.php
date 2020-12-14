<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;

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

// ADMIN
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/posts', [AdminController::class, 'posts']);
Route::get('/admin/posts/create', [PostController::class, 'create']);
Route::get('/admin/posts/edit/{id}', [PostController::class, 'edit']);
Route::post('/posts/store', [PostController::class, 'store']);
Route::post('/posts/publish/{id}', [PostController::class, 'publish']);
Route::put('/posts/update/{id}', [PostController::class, 'update']);
Route::delete('/posts/delete/{id}', [PostController::class, 'destroy']);

// PUBLIC
Route::get('/', [PostController::class, 'index']);
Route::get('/{slug}', [PostController::class, 'show']);
