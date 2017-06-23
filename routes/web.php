<?php

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

Route::get('/', 'MoviesController@landing')->name('index');

/*
	Routes for displaying stuff (movies, tv shows and stuff..)
*/

Route::get('/watch/movie/{id}', 'MoviesController@displayMovie')->name('display_movie');
Route::get('/s/cat/{id}', 'CategoriesController@byCategory')->name('search_category');
Route::get('/popular', 'MoviesController@popularMovies')->name('display_popular');

/*
	Routes for creating stuff (movies, categories, etc..)
*/

Route::get('/add/category', 'CategoriesController@create')->name('add_category');
Route::get('/add/movie', 'MoviesController@create')->name('add_movie');


/*
	Routes for storing stuff (categorie, movies, thumbnail, etc..)
*/

Route::post('/store/category', 'CategoriesController@store')->name('store_category');
Route::post('/store/movie', 'MoviesController@store')->name('store_movie');


Route::get('/thumbnail/{filename}', function ($filename) {

    $path = storage_path() . '/app/thumbnails/' . $filename;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;

})->name('thumbnail_get');

/*
	Routes for all other things (copyright, dmca..)
*/

Route::get('/dmca', function () {
	return view('other.dmca');
})->name('dmca');