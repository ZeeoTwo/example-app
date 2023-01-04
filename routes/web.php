<?php

use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SiteController;
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

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('about-us', [SiteController::class, 'about'])->name('about-us');
Route::get('laravel-help', [SiteController::class, 'help'])->name('laravel-help');

Route::get('posts', [PublicationController::class, 'index'])->name('post');
Route::post('post', [PublicationController::class, 'store'])->name('posts.store');
Route::get('post/create', [PublicationController::class, 'create'])->name('posts.create');
Route::get('post/{publication}', [PublicationController::class, 'show'])->name('post.view');

Route::get('post/{publication}/edit', [PublicationController::class, 'edit'])->name('posts.edit');
Route::post('post/{publication}', [PublicationController::class, 'update'])->name('posts.update');
Route::delete('post/{publication}', [PublicationController::class, 'destroy'])->name('posts.delete');

