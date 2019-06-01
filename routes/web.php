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
 
Auth::routes(['verify' => true]);
  

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/home', 'HomeController@index')->name('home');    
    
    Route::get('/posts','PostsController@index')->name('post.index');
    Route::get('/posts/create','PostsController@create')->name('post.create');
    Route::post('/posts', 'PostsController@store')->name('post.store');
    Route::get('/posts/{id}/edit', 'PostsController@edit')->name('post.edit');
    Route::put('/posts/{id}', 'PostsController@update')->name('post.update');
    Route::get('/posts/{id}', 'PostsController@show')->name('post.show');
    Route::delete('/posts/{id}', 'PostsController@destroy')->name('post.destroy');
    Route::get('/posts/image/{id}', 'PostsController@getImage')->name('post.image'); 

  
    Route::middleware(['admin'])->prefix('admin')->group(function () {

        Route::get('/', 'Admin\IndexController@index');
        Route::get('posts', 'Admin\PostsController@index');
        Route::get('posts.list', 'Admin\PostsController@posts'); 
        
        Route::get('users', 'Admin\UserController@index');
        Route::get('users.list', 'Admin\UserController@users'); 

    });

});

 