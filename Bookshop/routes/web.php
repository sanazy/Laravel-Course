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

Route::get('/', 'BookController@welcome');
Route::get('/books', 'BookController@index');
Route::get('/books/create/{locale}', 'BookController@locale');
Route::get('/books/create', 'BookController@create')->name('books.create');
Route::get('/books/{id}', 'BookController@show');
Route::post('/books', 'BookController@store')->name('books.store');
Route::get('/books/{id}/edit', 'BookController@edit')->name('books.edit');
Route::put('/books/{id}', 'BookController@update')->name('books.update');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('courses', 'CourseController@index');
Route::post('courses/import', 'CourseController@import');
Route::get('courses/export', 'CourseController@export');

