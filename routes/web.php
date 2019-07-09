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

//-------------------------------------//
use Illuminate\Support\Facades\Route;

Route::view('sign-up', 'sign-up');
Route::view('tag/create', 'create_tag');
Route::view('contact/location', 'google_map');

Route::get('/', 'LoginController@login')->middleware('prevent-back');
Route::get('dashboard', 'DashboardController@index');
Route::get('logout', 'LoginController@logout')->name('logout')->middleware('prevent-back');
Route::get('posts', 'PostsController@posts')->name('posts');
Route::get('create', 'PostsController@index');
Route::get('posts/edit/{id}', 'PostsController@edit')->where('id', '[0-9]+');
Route::get('posts/inactive', 'PostsController@inactivePosts');
Route::get('categories', 'CategoryController@categories');
Route::get('categories/create', 'CategoryController@index');
Route::get('categories/delete/{id}', 'CategoryController@delete')->where('id', '[0-9]+');
Route::get('categories/edit/{id}', 'CategoryController@edit')->where('id', '[0-9]+');
Route::get('categories/disable-item', 'CategoryController@disable_item');
Route::get('tag', 'TagController@index');
Route::get('tag/delete/{id}', 'TagController@delete')->where('id', '[0-9]+');
Route::get('tag/edit/{id}', 'TagController@edit')->where('id', '[0-9]+');

//Post route here
Route::post('/', 'LoginController@login');
Route::post('create', 'PostsController@store');
Route::post('posts/edit/{id}', 'PostsController@update')->where('id', '[0-9]+');
Route::post('posts/delete', 'PostsController@delete');
Route::post('categories/create', 'CategoryController@store');
Route::post('categories/edit/{id}', 'CategoryController@update')->where('id', '[0-9]+');
Route::post('tag/edit/{id}', 'TagController@update')->where('id', '[0-9]+');
Route::post('tag/create', 'TagController@store');
Route::post('posts/search', 'SearchController@search');
