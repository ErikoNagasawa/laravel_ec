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

Route::get('/', 'ItemController@index')->name('top');

Route::resource('users', 'UserController')->only([
    'show'    
]);
Route::get('users/{user}/exhibitions', 'UserController@exhibitions')->name('users.exhibitions');

Route::get('/profile/edit', 'UserController@edit')->name('profile.edit');
Route::patch('/profile', 'UserController@update')->name('profile.update');
Route::get('/profile/edit_image', 'UserController@editImage')->name('profile.edit_image');
Route::patch('/profile/edit_image', 'UserController@updateImage')->name('profile.update_image');

Route::get('/items/{item}/edit_image', 'ItemController@editImage')->name('items.edit_image');
Route::patch('/items/{item}/edit_image', 'ItemController@updateImage')->name('items.update_image');

Route::patch('/items/{item}/toggle_like', 'ItemController@toggleLike')->name('items.toggle_like');

Route::get('/items/{item}/confirm', 'ItemController@confirm')->name('items.confirm');
Route::patch('/items/{item}/finish', 'ItemController@finish')->name('items.finish');

Route::resource('items', 'ItemController');

Route::resource('likes', 'LikeController')->only([
    'index'    
]);
