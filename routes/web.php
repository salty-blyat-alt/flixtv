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


Route::get('/', [MovieController::class, 'populateHomePageMovie']);

Route::view('/catalog', 'pages.catalog');
Route::view('/pricing', 'pages.pricing');
Route::view('/live', 'pages.live');
Route::view('/about', 'pages.about');
Route::view('/profile', 'pages.profile');
Route::view('/contacts', 'pages.contacts');
Route::view('/interview', 'pages.interview');
Route::view('/signin', 'pages.signin');
Route::view('/privacy', 'pages.privacy');


Route::get('/category/{category_slug?}', function($category_slug = 0) {
    return view('pages.category', ['category_slug' => $category_slug]);
});
Route::get('/detail/{id?}', [MovieController::class, 'getMovieById']);


