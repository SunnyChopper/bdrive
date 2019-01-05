<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\ContentBankHelper;
use App\Custom\UploadHelper;

use Auth;
use Carbon\Carbon;

class ContentBankController extends Controller
{
	public function new() {
		// Check if guest
		if (Auth::guest()) {
			return redirect(url('/login'));
		} else {
			// Dynamic page elements
			$page_header = "New Content";
			$page_title = $page_header;

			// Return view
			return view('members.content-bank.new')->with('page_header', $page_header)->with('page_title', $page_title);
		}
	}

    public function create(Request $data) {
    	// Check if guest
    	if (Auth::guest()) {
    		return redirect(url('/login'));
    	} else {
    		// Upload file
    		$image = $data->file('image');
    		$file_path = "content-bank/" . Auth::id() . "/" . Carbon::now()->toDateTimeString() . "." . $image->getClientOriginalExtension();
    		$upload_helper = new UploadHelper();
    		$image_url = $upload_helper->upload_to_s3($image, $file_path);

    		// Create array for helper
    		$content_data = array(
    			"author_id" => Auth::id(),
    			"description" => $data->description,
    			"category" => $data->category,
    			"image_url" => $image_url
    		);

    		// Create
    		$content_bank_helper = new ContentBankHelper();
    		$post_id = $content_bank_helper->create($content_data);

    		// Go to post
    		return redirect(url('/members/content-bank/view/' . $post_id));
    	}
    }

    public function edit($post_id) {
    	// Check if guest
		if (Auth::guest()) {
			return redirect(url('/login'));
		} else {
			// Get post
			$content_bank_helper = new ContentBankHelper($post_id);
			$post = $content_bank_helper->read();

			if (Auth::id() != $post->author_id) {
				return redirect(url('/members/content-bank/view/' . $post_id));
			} else {
				// Dynamic page elements
				$page_header = "Edit Content";
				$page_title = $page_header;

				// Return view
				return view('members.content-bank.new')->with('page_header', $page_header)->with('page_title', $page_title)->with('post', $post);
			}
		}
    }

    public function update(Request $data) {
    	// Check if guest
    	if (Auth::guest()) {
    		return redirect(url('/login'));
    	} else {
    		// Create array for helper
    		$content_data = array(
    			"post_id" => $data->post_id,
    			"description" => $data->description,
    			"category" => $data->category
    		);

    		// Create
    		$content_bank_helper = new ContentBankHelper();
    		$content_bank_helper->update($content_data);

    		// Go to post
    		return redirect(url('/members/content-bank/view/' . $post_id));
    	}
    }

    public function delete(Request $data) {
    	// Check if guest
    	if (Auth::guest()) {
    		return redirect(url('/login'));
    	} else {
    		// Get post
			$content_bank_helper = new ContentBankHelper($data->post_id);
			$post = $content_bank_helper->read();

			if (Auth::id() != $post->author_id) {
				return redirect(url('/members/content-bank/view/' . $post_id));
			} else {
				// Delete
				$content_bank_helper->delete();

				// Redirect to home page of content bank
				return redirect(url('/members/content-bank/my'));
			}
    	}
    }

    public function view_post($post_id) {
    	// Get post
		$content_bank_helper = new ContentBankHelper($post_id);
		$post = $content_bank_helper->read();

		// Dynamic page elements
		$page_header = "ContentBank";
		$page_title = $page_header;

		// Return view
		return view('members.content-bank.view-post')->with('page_title', $page_title)->with('page_header', $page_header)->with('post', $post);
	}

	public function view_all() {
		// Get posts
		$content_bank_helper = new ContentBankHelper();
		$posts = $content_bank_helper->get_all_with_pagination(16);

		// Dynamic page elements
		$page_header = "ContentBank";
		$page_title = $page_header;

		// Return view
		return view('members.content-bank.view')->with('page_title', $page_title)->with('page_header', $page_header)->with('posts', $posts);
	}

	public function view_my() {
		// Get posts
		$content_bank_helper = new ContentBankHelper();
		$posts = $content_bank_helper->get_all_from_user(Auth::id());

		// Dynamic page elements
		$page_header = "ContentBank";
		$page_title = $page_header;

		// Return view
		return view('members.content-bank.view-my')->with('page_title', $page_title)->with('page_header', $page_header)->with('posts', $posts);
	}
}
