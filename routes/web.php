<?php

use App\Http\Controllers\CommentController;
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

// Get all comments
Route::get('/comments', [CommentController::class, 'index'])->name('comments');
// Create a new comment
Route::post('/comments', [CommentController::class, 'store'])->name('comments.create');

