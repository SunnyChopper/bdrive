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
Route::post('/contact/submit', 'PagesController@submit_contact');
Route::get('/courses', 'PagesController@courses');
Route::get('/free-course', 'PagesController@free_course');
Route::get('/blog', 'PagesController@blog');
Route::get('/post/{post_id}/{slug}', 'PagesController@view_post');
Route::get('/test', 'PagesController@test');

// Members site
Route::get('/members/profile/{user_id}', 'MembersController@profile');
Route::get('/members/profile/edit/{user_id}', 'MembersController@edit_profile');
Route::post('/members/profile/update', 'MembersController@update_profile');
Route::get('/members/dashboard', 'MembersController@dashboard');
Route::get('/members/logout', 'MembersController@logout');

// Admin site
Route::get('/admin', 'AdminController@index');
Route::post('/admin/login', 'AdminController@authenticate_user');
Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/posts/view', 'AdminController@view_blog_posts');
Route::get('/admin/posts/new', 'AdminController@new_blog_post');
Route::get('/admin/posts/edit/{post_id}', 'AdminController@edit_blog_post');

// Newsletter functions
Route::post('/newsletter/submit', 'NewsletterController@subscribe_user');

// Lead magnet functions
Route::get('/admin/lead-magnets/view', 'LeadMagnetsController@view_lead_magnets');
Route::get('/admin/lead-magnets/new', 'LeadMagnetsController@new_lead_magnet');
Route::get('/admin/lead-magnets/edit/{lead_magnet_id}', 'LeadMagnetsController@edit_lead_magnet');
Route::get('/lp/{slug}', 'LeadMagnetsController@read');
Route::post('/admin/lead-magnets/create', 'LeadMagnetsController@create');
Route::post('/admin/lead-magnets/update', 'LeadMagnetsController@update');
Route::post('/admin/lead-magnets/delete', 'LeadMagnetsController@delete');

// Lead functions
Route::get('/admin/lead-magnets/{lead_magnet_id}/details', 'LeadsController@view_leads_for_lead_magnet');
Route::post('/lp/submit', 'LeadsController@create');

// Blog post functions
Route::post('/admin/posts/create', 'BlogPostsController@create');
Route::post('/admin/posts/update', 'BlogPostsController@update');
Route::post('/admin/posts/delete', 'BlogPostsController@delete');

Auth::routes();

// Premium Content functions
Route::get('/members/premium/{content_id}', 'PremiumContentController@read');
Route::get('/admin/premium/view', 'PremiumContentController@view_premium_content');
Route::get('/admin/premium/edit/{post_id}', 'PremiumContentController@edit_premium_content');
Route::get('/admin/premium/new', 'PremiumContentController@new_premium_content');
Route::post('/admin/premium/create', 'PremiumContentController@create');
Route::post('/admin/premium/update', 'PremiumContentController@update');
Route::post('/admin/premium/delete', 'PremiumContentController@delete');

// Content bank functions
Route::get('/members/content-bank/my', 'ContentBankController@view_my');
Route::get('/members/content-bank/view', 'ContentBankController@view_all');
Route::get('/members/content-bank/view/{post_id}', 'ContentBankController@view_post');
Route::get('/members/content-bank/new', 'ContentBankController@new');
Route::post('/members/content-bank/create', 'ContentBankController@create');
Route::get('/members/content-bank/edit/{post_id}', 'ContentBankController@edit');
Route::post('/members/content-bank/update', 'ContentBankController@update');
Route::post('/members/content-bank/delete', 'ContentBankController@delete');
Route::get('/members/content-bank/download/{post_id}', 'ContentBankController@download');