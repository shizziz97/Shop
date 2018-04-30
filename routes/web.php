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
Route::get('/index','PagesController@getIndex')->name('index');
Route::get('/about' , 'PagesController@getAbout');
Route::get('/contact','PagesController@getContact');
Route::resource('/posts','PostController');
Route::get('blog/{slug}',['as' => 'blog.single' , 'uses' => 'BlogController@getSingle']);
Route::get('/search' , 'BlogController@getSearch')->name('blog.search');
Route::post('/search' , 'BlogController@getSearch')->name('blog.search');
Route::resource('/category','CategoryController',['except'=> 'create']);
Route::post('/categoryDelete','CategoryController@deleteAll')->name('delete.cat');
Route::resource('/tags','TagController', ['except'=> 'create']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
