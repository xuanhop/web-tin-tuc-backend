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
Route::get('/', function (){
   return view('login');
});
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('posts', 'PostsController@posts');
Route::get('create', function (){
    $categories = \App\Category::all();
    return view('layouts.create', ['categories' => $categories]);
});
Route::get('posts/edit/{id}', 'PostsController@edit');
Route::get('posts/search', 'SearchController@search');

//Post route here
Route::post('/', 'LoginController@login');
Route::post('create', 'PostsController@store');
Route::post('/posts/edit/{id}', 'PostsController@update');
Route::post('/posts/delete' , 'PostsController@delete');

