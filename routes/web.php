<?php

use App\Book;
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
	
});


Route::group(['prefix'=>'admin'], function(){

	Route::get('books', 'Admin\BookController@getIndex');

	Route::get('books/new', 'Admin\BookController@getAddBook');

	Route::post('books/new', 'Admin\BookController@postAddBook');

	Route::get('books/edit/{id}', 'Admin\BookController@getEditBook');

	Route::get('books/author', 'Admin\AuthorController@getIndex');

	Route::get('books/translator', 'Admin\TranslatorController@getIndex');

	Route::get('books/nph', 'Admin\NPHController@getIndex');

	Route::get('books/nxb', 'Admin\NXBController@getIndex');

	Route::get('books/language', 'Admin\LanguageController@getIndex');

	Route::get('books/age', 'Admin\AgeController@getIndex');

	Route::get('books/topic', 'Admin\TopicController@getIndex');

	Route::get('books/category', 'Admin\CategoryController@getIndex');
});

