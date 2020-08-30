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

Route::get('/', 'FrontEndController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Categories

Route::get('/categories/status/update/{category}', 'categorycontroller@statusupdate')->name('categories.status.update');

Route:: resource('/categories', 'CategoryController');

//Posts

Route::get('/posts/details/{post}', 'FrontEndController@getSinglePost')->name('get.single.posts');

Route::post('/comments/post/{post}', 'CommentController@postCommentStore')->name('posts.comments.store');

Route:: resource('/posts', 'PostController');


//Forums

Route::get('/public/forums', 'FrontEndController@publicForum')->name('forums.public');

Route::get('/forums/details/{forum}', 'FrontEndController@getSingleForum')->name('get.single.forums');

Route::post('/comments/forum/{forum}', 'CommentController@forumCommentStore')->name('forums.comments.store');


Route:: resource('/forums', 'ForumController');

Route:: resource('/tags', 'TagController');



