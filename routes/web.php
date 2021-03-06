<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'IndexController@getIndex');
Route::get('/forum', 'ForumController@getIndex');
Route::get('/memes', 'MemesController@getIndex');

Route::get('/forum/thread', 'ForumController@getAddThread');
Route::post('/forum/thread', 'ForumController@postAddThread');
Route::get('/forum/post/{id}', 'ForumController@getForumPost');

Route::get('/forum/post/{id}/comment', 'CommentController@getAddComment');
Route::post('/forum/post/{id}/comment', 'CommentController@postAddComment');
Route::get('/forum/post/{id}/modify/comment', 'CommentController@getModifyComment');
Route::post('/forum/post/{id}/modify/comment', 'CommentController@postModifyComment');
Route::get('/forum/post/{id}/delete/comment', 'CommentController@getDeleteComment');

Route::get('/forum/post/{id}/modify/topic', 'ForumController@getModifyThread');
Route::post('/forum/post/{id}/modify/topic', 'ForumController@postModifyThread');
Route::get('/forum/post/{id}/delete/thread', 'ForumController@getDeleteThread');

Route::get('/memes/post', 'MemesController@getAddMeme');
Route::post('/memes/post', 'MemesController@postAddMeme');
Route::get('memes/{id}/delete', 'MemesController@getDeleteMeme');
Route::get('memes/id/{id}', 'MemesController@getMemePage');
Route::post('memes/id/{id}', 'MemesController@postAddCommentMeme');


Route::get('/profile/{id}/edit', 'ProfileController@getModifyProfile');
Route::get('/profile/{id}/topics', 'ProfileController@getPosts');
Route::get('/profile/{id}/memes', 'ProfileController@getMemes');
Route::get('/profile/{id}/comments', 'ProfileController@getComments');
Route::post('/profile/{id}/edit', 'ProfileController@postModifyProfile');
Route::get('/profile/{id}', 'ProfileController@getIndex');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
