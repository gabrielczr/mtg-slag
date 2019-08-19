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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'SearchController@index')->name('search');
Route::get('/cardDisplay', 'CardDisplayController@cardDisplay')->name('cardDisplay');
Route::get('/searchResults', 'CardDisplayController@cardDisplay');
Route::get('/nextPage', 'CardDisplayController@cardDisplay');
