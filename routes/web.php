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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/shop', 'ProductsController@index')->name('shop');

//User
Route::get('profile', 'UsersController@show')->middleware('auth')->name('profile.show');
Route::get('profile/edit/{id}', 'UsersController@edit')->middleware('auth')->name('profile.edit');
Route::post('profile/{id}/update', 'UsersController@update')->middleware('auth')->name('profile.update');
Route::get('/profile/drop/{id}', 'UsersController@destroy')->middleware('auth')->name('profile.drop');

//Products
Route::get('/products/new', 'ProductsController@create')->name('products.new');
Route::post('/products/add', 'ProductsController@store')->name('products.add');
Route::get('/products/show/{id}', 'ProductsController@show')->name('products.show');
Route::get('/products/edit/{id}', 'ProductsController@edit')->name('products.edit');
Route::post('/products/{id}/update', 'ProductsController@update')->name('products.update');
Route::get('/products/drop/{id}', 'ProductsController@destroy')->name('products.drop');
Route::get('/search', 'ProductsController@search')->name('products.search');

//Categories
Route::get('/category/show', 'CategoriesController@index')->middleware('admin')->name('categories.show');
Route::get('/category/new', 'CategoriesController@create')->middleware('admin')->name('categories.new');
Route::post('/category/add', 'CategoriesController@store')->middleware('admin')->name('categories.add');
Route::get('/category/edit/{id}', 'CategoriesController@edit')->middleware('admin')->name('categories.edit');
Route::post('/category/{id}/update', 'CategoriesController@update')->middleware('admin')->name('categories.update');
Route::get('/category/drop/{id}', 'CategoriesController@destroy')->middleware('admin')->name('categories.drop');

//Messages
Route::post('/message/add', 'MessagesController@store')->name('message.add');

//Images
Route::get('/products/image/drop/{id}', 'ProductsImageController@destroy')->name('image.drop');
