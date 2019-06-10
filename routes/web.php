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
    return view('toppage');
});
Route::group(['middleware' => 'auth'], function () {


    Route::get('top', 'PostsController@index')->name('top');

    Route::get('search', 'PostsController@search')->name('search');
    Route::get('search2', 'PostsController@search2')->name('search2');

    Route::get('/posts/create', 'PostsController@showCreateForm')->name('posts.create');
    Route::post('/posts/create', 'PostsController@create');

    Route::get('/posts/{post_id}/edit', 'PostsController@showEditForm')->name('posts.edit');
    Route::post('/posts/{post_id}/edit', 'PostsController@edit');

    Route::delete('/posts/{post_id}/delete', 'PostsController@destroy')->name('posts.destroy');

    Route::get('/users/{user_id}', 'UsersController@mypage')->name('users.mypage');

    Route::get('/users/{user_id}/categoryEdit', 'UsersController@showCategoryEditForm')->name('users.categoryedit');
    Route::post('/users/{user_id}/categoryEdit', 'UsersController@CategoryEdit');
});

Auth::routes();
