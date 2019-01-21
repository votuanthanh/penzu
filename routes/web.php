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


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'journal', 'middleware' => ['auth']], function() {
    Route::get('create', 'JournalController@create')->name('journal.create');
    Route::post('/', 'JournalController@store')->name('journal.store');
    Route::get('show/{id}', 'JournalController@show')->name('journal.show');
    Route::get('{id}/edit', 'JournalController@edit')->name('journal.edit');
    Route::put('update/{id}', 'JournalController@update')->name('journal.update');
    Route::delete('{id}','JournalController@delete')->name('journal.delete');
    Route::get('/pdf/{id}','JournalController@exportPDF')->name('journal.export');
    Route::any('search', 'JournalController@search')->name('journal.search');
});

Route::resource('journal','JournalController');
Route::get('/', 'JournalController@index')->name('journal.index');

Route::group(['prefix' => 'album', 'middleware' => ['auth']], function() {
    Route::get('create', 'AlbumController@create')->name('album.create');
    Route::post('/', 'AlbumController@store')->name('album.store');
    
    Route::get('{id}/edit', 'AlbumController@edit')->name('album.edit');
    Route::put('update/{id}', 'AlbumController@update')->name('album.update');
    Route::delete('{id}', 'AlbumController@delete')->name('album.delete');

});

Route::group(['prefix' => 'image', 'middleware' => ['auth']], function() {
    Route::get('create/{id}', 'ImageController@create')->name('image.create');
    Route::post('/', 'ImageController@store')->name('image.store');
    Route::delete('{id}', 'ImageController@delete')->name('image.delete');

});

Route::get('/album', 'AlbumController@index')->name('album.index');
Route::get('album/show/{id}', 'AlbumController@show')->name('album.show');
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function() {
    Route::get('edit', 'UserController@edit')->name('user.edit');
    Route::put('update', 'UserController@update')->name('user.update');

});

Route::group(['prefix' => 'comments', 'middleware' => ['auth']], function() {
    Route::post('/', 'CommentsController@store')->name('comments.store');
    Route::delete('{id}', 'CommentsController@delete')->name('comments.delete');
    Route::put('update/{id}', 'CommentsController@update')->name('comments.update');
});

Route::get('/auth/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'SocialAuthController@handleProviderCallback');

