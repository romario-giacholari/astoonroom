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


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::group(['middleware' => 'auth'], function () {

Route::get('/home', 'HomeController@index');
Route::post('/article/store', 'ArticlesController@store');
Route::delete('/articles/{id}/delete', 'ArticlesController@destroy');
Route::get('/articles/{title}/edit', 'ArticlesController@edit');
Route::patch('/articles/{title}/update', 'ArticlesController@update');
Route::get('/articles/search', 'ArticlesController@search');

Route::post('/articles/{id}/photos/', 'PhotoController@store');
Route::delete('/photos/{id}', 'PhotoController@destroy');



});

Route::get('/articles/', 'ArticlesController@index');
Route::get('/articles/{title}', 'ArticlesController@show');
Route::get('/articles/search', 'ArticlesController@search');

Route::any('/{catchall}/', function() {
  return redirect('/');
})->where('catchall', '.*');

Route::any('/articles/{id}/{catchall}', function() {
  return redirect('/');
})->where('catchall', '.*');

Route::any('/articles/{catchall}/', function() {
  return redirect('/');
})->where('catchall', '.*');


