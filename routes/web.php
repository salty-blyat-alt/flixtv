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
Route::get('/catalog', [MovieController::class, 'populateCatalogPage']);
Route::get('/category', [MovieController::class, 'populateCategoryPage']);
Route::get('/search={searchTerm}', [MovieController::class, 'search']);

Route::view('/pricing', 'pages.pricing');
Route::view('/live', 'pages.live');
Route::view('/about', 'pages.about');
Route::view('/profile', 'pages.profile');
Route::view('/contacts', 'pages.contacts');
Route::view('/interview', 'pages.interview');
Route::view('/signin', 'pages.signin');
Route::view('/privacy', 'pages.privacy');


Route::get('movie/detail/{id?}', [MovieController::class, 'getMovieById']);
Route::get('tv/detail/{id?}', [MovieController::class, 'getTvShow']);


