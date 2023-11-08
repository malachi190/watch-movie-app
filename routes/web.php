<?php

// use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Movie Routes

Route::get("/", 'App\Http\Controllers\MoviesController@index')->name('movies.index');
Route::get('/movies/{movie}', 'App\Http\Controllers\MoviesController@show')->name('movies.show');

// Actors Routes
Route::get("/actors", 'App\Http\Controllers\ActorsController@index')->name('actors.index');
Route::get("/actors/page/{page?}", 'App\Http\Controllers\ActorsController@index');
Route::get('/actors/{actor}', 'App\Http\Controllers\ActorsController@show')->name('actors.show');

// Tv Shows Routes

Route::get('/tv_shows', 'App\Http\Controllers\ShowsContoller@index')->name('shows.index');
Route::get('/tv_shows/show/{show_id}', 'App\Http\Controllers\ShowsContoller@show')->name('shows.tvshow');

