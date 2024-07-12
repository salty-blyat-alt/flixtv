<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;


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

Route::view('/', 'pages.index2');
Route::view('/catalog', 'pages.catalog');
Route::view('/pricing', 'pages.pricing');
Route::view('/live', 'pages.live');
Route::view('/about', 'pages.about');
Route::view('/profile', 'pages.profile');
Route::view('/contacts', 'pages.contacts');
Route::view('/interview', 'pages.interview');
Route::view('/signin', 'pages.signin');
Route::view('/details', 'pages.details2');


Route::get('/category', [MovieController::class, 'getCategory']);
Route::get('/movies/category/{category_slug}', function($category_slug = 0) {
    return view('pages.details2', ['slug' => $category_slug]);
});

Route::get('/details/{movie_slug}', function($movie_slug) {
    return view('pages.details3', ['movie_slug' => $movie_slug]);
});
