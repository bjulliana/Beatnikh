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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('profile', 'UsersController@show')->middleware('auth')->name('profile.show');
Route::get('profile/edit/{id}', 'UsersController@edit')->middleware('auth')->name('profile.edit');
Route::post('profile/{id}/update', 'UsersController@update')->middleware('auth')->name('profile.update');
Route::get('/products/new', 'ProductsController@create');
Route::post('/products/add', 'ProductsController@store');
Route::get('/category/show', 'CategoriesController@index')->middleware('admin')->name('categories.show');
Route::get('/category/new', 'CategoriesController@create')->middleware('admin')->name('categories.new');
Route::post('/category/add', 'CategoriesController@store')->middleware('admin')->name('categories.add');
Route::get('/products/show/{id}', 'ProductsController@show');
Route::post('/message/add', 'MessagesController@store');
