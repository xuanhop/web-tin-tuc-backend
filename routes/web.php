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

Route::view('/', 'login');
Route::view('sign-up', 'sign-up');
Route::view('tag/create', 'create_tag');

Route::get('logout', 'LoginController@logout')->name('logout');
Route::get('posts', 'PostsController@posts')->name('posts');
Route::get('create', 'PostsController@index');
Route::get('posts/edit/{id}', 'PostsController@edit');
Route::post('posts/search', 'SearchController@search');
Route::get('posts/inactive', 'PostsController@inactivePosts');
Route::get('categories', 'CategoryController@categories');
Route::get('categories/create', 'CategoryController@index');
Route::get('categories/delete/{id}', 'CategoryController@delete');
Route::get('categories/edit/{id}', 'CategoryController@edit');
Route::get('categories/disable-item', 'CategoryController@disable_item');
Route::get('tag', 'TagController@index');
Route::get('tag/delete/{id}', 'TagController@delete');
Route::get('tag/edit/{id}', 'TagController@edit');
//Post route here
Route::post('/', 'LoginController@login');
Route::post('create', 'PostsController@store');
Route::post('posts/edit/{id}', 'PostsController@update');
Route::post('/posts/delete', 'PostsController@delete');
Route::post('categories/create', 'CategoryController@store');
Route::post('categories/edit/{id}', 'CategoryController@update');
Route::post('tag/edit/{id}', 'TagController@update');
Route::post('tag/create', 'TagController@store');
