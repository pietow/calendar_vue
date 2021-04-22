<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Gallery;
/* use App\Http\Controllers\GalleryController; */
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
    return view('dashboard.welcome');
});

Route::get('/main', function () {
    return view('main');
})->name('main');
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blog', 'App\Http\Controllers\PostController@index')->name('blog');

Route::get('/article/{id}', 'App\Http\Controllers\PostController@show')->name('article');

Route::get('/galerien', 'App\Http\Controllers\GalleryController@index')->name('galleries');

Route::get('/galerie/{id}', 'App\Http\Controllers\GalleryController@show')->name('carousel.gallery');

Route::get('/galerie/{id}/grid', 'App\Http\Controllers\ListGalleryGrid')->name('grid.gallery');

/* Route::get('/galerie/carousel', function () { */
/*     return view('carousel'); */
/* })->name('carousel'); */
Route::get('/impressum', function () {
    return view('impressum');
})->name('impressum');


Route::get('/test', function () {
    dd(User::first()->events);
    return User::all();
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/calendar', function () {
    return view('dashboard.calendar');
})->middleware(['auth'])->name('calendar');

Route::get('/cms', function () {
    return view('dashboard.cms');
})->middleware(['auth'])->name('cms.blog');

require __DIR__.'/auth.php';
