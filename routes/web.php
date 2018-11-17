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

Route::get('/journal', 'JournalController@index')->name('journal.index');

Route::get('/journal/create', 'JournalController@create')->name('journal.create');
Route::post('/journal', 'JournalController@store')->name('journal.store');

