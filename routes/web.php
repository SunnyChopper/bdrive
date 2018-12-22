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

// Members site
Route::get('/members/dashboard', 'MembersController@dashboard');

// Admin site
Route::get('/admin', 'AdminController@index');
Route::get('/admin/dashboard', 'AdminController@dashboard');

Auth::routes();
