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

Route::get('/', 'HomeController@index');

// Route::get('/tasks', 'TaskController@index');
// Route::get('/tasks/{id}', 'TaskController@show');
Route::resource('/tasks', 'TaskController');
Route::resource('/movies', 'MovieController');
Auth::routes();
Route::get('/search/{search}', 'SearchController@index')->name('search');

Route::get('/home', 'HomeController@index')->name('home');