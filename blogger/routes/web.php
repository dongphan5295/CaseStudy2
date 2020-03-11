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




Auth::routes(['register' => false]);

Route::get('/admin', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web']], function () {
    // Authentication Routes

    Route::resource('categories', 'CategoryController', ['except' => ['create']]);
    Route::get('softcategories', 'CategoryController@SoftDelete')->name('categories.softdelete');
    Route::get('softcategories/{id}/restore', 'CategoryController@RestoreDelete')->name('categories.restore');
    Route::get('softcategories/{id}/force', 'CategoryController@HardDelete')->name('categories.force');

    Route::resource('tags', 'TagController', ['except' => ['create']]);
    Route::get('softtags', 'TagController@SoftDelete')->name('tags.softdelete');
    Route::get('softtags/{id}/restore', 'TagController@RestoreDelete')->name('tags.restore');
    Route::get('softtags/{id}/force', 'TagController@HardDelete')->name('tags.force');

	Route::post('comments/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comments.store']);
	Route::get('comments/{id}/edit', ['uses' => 'CommentController@edit', 'as' => 'comments.edit']);
	Route::put('comments/{id}', ['uses' => 'CommentController@update', 'as' => 'comments.update']);
	Route::delete('comments/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);
	Route::get('comments/{id}/delete', ['uses' => 'CommentController@delete', 'as' => 'comments.delete']);


    Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
    Route::get('blog', [ 'uses' => 'BlogController@getIndex' , 'as' => 'blog.index']);
    Route::get('blogs/{id}', [ 'uses' => 'BlogController@getCategory' , 'as' => 'blogs.types']);
    Route::get('blogs/tags/{id}', [ 'uses' => 'BlogController@getTags' , 'as' => 'blogs.tags']);
    Route::get('/keyword', 'BlogController@getSearch')->name('keyword.search');
    Route::get('contact', 'PagesController@getContact');
    Route::post('contact', 'PagesController@postContact');
    Route::get('about', 'PagesController@getAbout');
    Route::get('/', 'PagesController@getIndex');
    Route::resource('posts', 'PostController');
    Route::get('softdelete', 'PostController@SoftDelete')->name('posts.softdelete');
    Route::get('softdelete/{id}/restore', 'PostController@RestoreDelete')->name('posts.restore');
    Route::get('softdelete/{id}/force', 'PostController@HardDelete')->name('posts.force');
});




