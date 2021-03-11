<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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
Route::get('/blog', function () {
    return view('blog');
})->name('blog');
Route::get('/galerie', function () {
    return view('galerie');
})->name('galerie');
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

require __DIR__.'/auth.php';
