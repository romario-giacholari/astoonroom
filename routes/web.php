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
Route::get('/articles/search', 'ArticlesController@search');
Route::get('/articles/{id}', 'ArticlesController@show');
Route::get('/articles/', 'ArticlesController@index');	



Route::group(['middleware' => 'auth'], function () {

Route::get('/home', 'HomeController@index');
Route::post('/article/store', 'ArticlesController@store');
Route::delete('/articles/{id}/delete', 'ArticlesController@destroy');
Route::get('/articles/{id}/edit', 'ArticlesController@edit');
Route::patch('/articles/{id}/update', 'ArticlesController@update');


});