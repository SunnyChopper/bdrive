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

// Public site
Route::get('/', 'PagesController@index');
Route::get('/contact', 'PagesController@contact');
Route::get('/blog', 'PagesController@blog');
Route::get('/post/{post_id}/{slug}', 'PagesController@view_post');

// Members site
Route::get('/members/dashboard', 'MembersController@dashboard');

// Admin site
Route::get('/admin', 'AdminController@index');
Route::post('/admin/login', 'AdminController@authenticate_user');
Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/posts/view', 'AdminController@view_blog_posts');
Route::get('/admin/posts/new', 'AdminController@new_blog_post');
Route::get('/admin/posts/edit/{post_id}', 'AdminController@edit_blog_post');

// Blog post functions
Route::post('/admin/posts/create', 'BlogPostsController@create');
Route::post('/admin/posts/update', 'BlogPostsController@update');
Route::post('/admin/posts/delete', 'BlogPostsController@delete');

Auth::routes();
