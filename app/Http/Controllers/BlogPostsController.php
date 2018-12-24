<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\BlogPostHelper;

use Auth;

class BlogPostsController extends Controller
{
    public function create(Request $data) {
    	$blog_post_helper = new BlogPostHelper();
    	$post_data = array(
    		"author_id" => Auth::id(),
    		"title" => $data->title,
    		"body" => $data->body,
    		"slug" => $data->slug,
    		"featured_image_url" => $data->featured_image_url
    	);
    	$blog_post_helper->create($post_data);
    	return redirect(url('/admin/posts/view'));
    }

    public function update(Request $data) {
    	$blog_post_helper = new BlogPostHelper();
    	$post_data = array(
    		"post_id" => $data->post_id,
    		"title" => $data->title,
    		"body" => $data->body,
    		"slug" => $data->slug,
    		"featured_image_url" => $data->featured_image_url
    	);
    	$blog_post_helper->update($post_data);
    	return redirect(url('/admin/posts/view'));
    }

    public function delete(Request $data) {
    	$blog_post_helper = new BlogPostHelper($data->post_id);
    	$blog_post_helper->delete();
    	return redirect(url('/admin/posts/view'));
    }
}
