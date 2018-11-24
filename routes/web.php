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



Auth::routes();

//test thu di e
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'journal', 'middleware' => ['auth']], function() {
	Route::get('create', 'JournalController@create')->name('journal.create');
	Route::post('/', 'JournalController@store')->name('journal.store');
	Route::get('show/{id}', 'JournalController@show')->name('journal.show');
	Route::get('{id}/edit', 'JournalController@edit')->name('journal.edit');
	Route::put('update/{id}', 'JournalController@update')->name('journal.update');
	Route::delete('{id}','JournalController@delete')->name('journal.delete');
	Route::get('/pdf','JournalController@exportPDF')->name('journal.export');
});
Route::resource('journal','JournalController');
Route::get('/', 'JournalController@index')->name('journal.index');

Route::group(['prefix' => 'album', 'middleware' => ['auth']], function() {
	Route::get('create', 'AlbumController@create')->name('album.create');
	Route::post('/', 'AlbumController@store')->name('album.store');
	Route::get('show/{id}', 'AlbumController@show')->name('album.show');
	Route::get('{id}/edit', 'AlbumController@edit')->name('album.edit');
	Route::put('update/{id}', 'AlbumController@update')->name('album.update');
	Route::delete('{id}', 'AlbumController@delete')->name('album.delete');
});
Route::get('/album', 'AlbumController@index')->name('album.index');


