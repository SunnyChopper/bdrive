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
Route::get('/courses/{course_id}', 'PagesController@view_course');
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
Route::get('/admin/logout', 'AdminController@logout');
Route::get('/admin/personal-coaching', 'AdminController@view_personal_coaching');
Route::get('/admin/personal-coaching/mentee/{mentee_id}', 'AdminController@view_mentee');
Route::get('/admin/personal-coaching/mentee/{mentee_id}/documents/new', 'AdminController@new_mentee_document');
Route::post('/admin/personal-coaching/documents/create', 'AdminController@create_mentee_document');
Route::get('/admin/personal-coaching/mentee/{mentee_id}/documents/{document_id}/edit', 'AdminController@edit_mentee_document');
Route::post('/admin/personal-coaching/documents/update', 'AdminController@update_mentee_document');
Route::post('/admin/personal-coaching/documents/delete', 'AdminController@delete_mentee_document');
Route::get('/admin/personal-coaching/mentee/{mentee_id}/recommendations/new', 'AdminController@new_recommendation');
Route::post('/admin/personal-coaching/recommendations/create', 'AdminController@create_recommendation');
Route::get('/admin/personal-coaching/mentee/{mentee_id}/recommendations/{r_id}/edit', 'AdminController@edit_recommendation');
Route::post('/admin/personal-coaching/recommendations/update', 'AdminController@update_recommendation');
Route::post('/admin/personal-coaching/recommendations/delete', 'AdminController@delete_recommendation');
Route::get('/admin/personal-coaching/mentee/{mentee_id}/tasks/new', 'AdminController@new_task');
Route::post('/admin/personal-coaching/tasks/create', 'AdminController@create_task');
Route::get('/admin/personal-coaching/mentee/{mentee_id}/tasks/{task_id}/edit', 'AdminController@edit_task');
Route::post('/admin/personal-coaching/tasks/update', 'AdminController@update_task');
Route::post('/admin/personal-coaching/tasks/delete', 'AdminController@delete_task');
Route::get('/admin/personal-coaching/mentee/{mentee_id}/videos/new', 'AdminController@new_video');
Route::post('/admin/personal-coaching/videos/create', 'AdminController@create_video');
Route::get('/admin/personal-coaching/mentee/{mentee_id}/videos/{video_id}/edit', 'AdminController@edit_video');
Route::post('/admin/personal-coaching/videos/update', 'AdminController@update_video');
Route::post('/admin/personal-coaching/videos/delete', 'AdminController@delete_video');
Route::get('/admin/questions', 'AdminController@view_direct_questions');
Route::get('/admin/questions/answer/{question_id}', 'AdminController@answer_direct_question');
Route::post('/admin/questions/answer/submit', 'AdminController@answer_question');
Route::get('/admin/niches', 'AdminController@view_niches');
Route::get('/admin/niches/new', 'AdminController@new_niche');
Route::post('/admin/niches/create', 'NicheExplorerController@create_niche');
Route::get('/admin/niches/edit/{niche_id}', 'AdminController@edit_niche');
Route::post('/admin/niches/update', 'NicheExplorerController@update_niche');
Route::get('/admin/niches/delete', 'NicheExplorerController@delete_niche');
Route::get('/admin/niches/{niche_id/questions', 'AdminController@view_niche_questions');

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

// Course functions
Route::get('/admin/courses', 'CoursesController@view_all');
Route::get('/admin/courses/new', 'CoursesController@new_course');
Route::get('/admin/courses/edit/{course_id}', 'CoursesController@edit_course');
Route::get('/admin/courses/modules/{course_id}/edit', 'CoursesController@edit_course_modules');

Route::get('/members/courses', 'CoursesController@view_courses');
Route::get('/members/courses/{course_id}/dashboard', 'CoursesController@view_course_dashboard');
Route::get('/members/courses/{course_id}/watch/{video_id}', 'CoursesController@view_course_video');

// Public courses functions
Route::get('/admin/public-courses/view', 'PublicCoursesController@view_all');
Route::get('/admin/public-courses/new', 'PublicCoursesController@new');
Route::post('/admin/public-courses/create', 'PublicCoursesController@create');
Route::get('/admin/public-courses/edit/{public_course_id}', 'PublicCoursesController@edit');
Route::post('/admin/public-courses/update', 'PublicCoursesController@update');
Route::post('/admin/public-courses/delete', 'PublicCoursesController@delete');
Route::get('/admin/public-courses/{public_course_id}/videos/view', 'PublicCourseVideosController@view_all');
Route::get('/admin/public-courses/{public_course_id}/videos/new', 'PublicCourseVideosController@new');
Route::post('/admin/public-courses/videos/create', 'PublicCourseVideosController@create');
Route::get('/admin/public-courses/{public_course_id}/videos/edit/{video_id}', 'PublicCourseVideosController@edit');
Route::post('/admin/public-courses/videos/update', 'PublicCourseVideosController@update');
Route::post('/admin/public-courses/videos/delete', 'PublicCourseVideosController@delete');
Route::get('/public-courses', 'PublicCoursesController@view_courses');
Route::get('/public-courses/{public_course_id}', 'PublicCoursesController@read');
Route::get('/public-courses/enroll/{public_course_id}', 'PublicCourseEnrollmentsController@create');
Route::get('/members/public-courses/view/{public_course_id}', 'PublicCoursesController@course_dashboard');
Route::get('/members/public-courses/video/{video_id}', 'PublicCourseVideosController@read');
Route::post('/members/public-courses/comment/create', 'PublicCourseVideoCommentsController@create');
Route::get('/members/public-courses/{public_course_id}/videos', 'PublicCoursesController@course_videos');
Route::get('/members/public-courses/{public_course_id}/forums/new', 'PublicCoursesController@new_forum');
Route::post('/members/public-courses/forums/create', 'PublicCourseForumsController@create');
Route::get('/members/public-courses/{public_course_id}/forums/{forum_id}', 'PublicCoursesController@view_forum');
Route::post('/members/public-courses/forums/comment/create', 'PublicCourseForumCommentsController@create');