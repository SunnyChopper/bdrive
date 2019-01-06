<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\UploadHelper;

use Auth;

use App\User;

class MembersController extends Controller
{
    public function dashboard() {
    	// Dynamic page elements
    	$page_title = "Dashboard";
    	$page_header = "Dashboard";

    	// Get user
    	$user = Auth::user();

    	return view('members.dashboard')->with('page_header', $page_header)->with('page_title', $page_title)->with('user', $user);
    }

    public function profile($user_id) {
    	// Get user
    	$user = User::find($user_id);

    	// Dynamic page elements
    	$page_header = $user->first_name;
    	$page_title = $page_header;

    	return view('members.view-profile')->with('page_header', $page_header)->with('page_title', $page_title)->with('user', $user);
    }

    public function edit_profile($user_id) {
    	// Check if same user
    	if (Auth::guest()) {
    		return redirect(url('/login'));
    	} else {
    		if (Auth::user()->id == $user_id) {
    			// Get user
		    	$user = User::find($user_id);

		    	// Dynamic page elements
		    	$page_header = $user->first_name;
		    	$page_title = $page_header;

		    	return view('members.view-profile')->with('page_header', $page_header)->with('page_title', $page_title)->with('user', $user);
    		} else {
    			return redirect(url('/members/profile/' . $user_id));
    		}
    	}
    }

    public function update_profile(Request $data) {
    	// Make sure same user
    	if (Auth::guest()) {
    		return redirect(url('/login'));
    	} else {
    		if (Auth::user()->id == $data->user_id) {
    			// Get user
    			$user = User::find($data->user_id);

    			// Check if username taken
    			if (($data->username != $user->username) && (User::where('username', strtolower($data->username))->count() > 0)) {
    				return redirect()->back()->with('error', 'Username already taken.');
    			}

    			// Check if email taken
    			if (($data->email != $user->email) && (User::where('email', strtolower($data->email))->count() > 0)) {
    				return redirect()->back()->with('error', 'Account with that email already exists.');
    			}

    			// Upload image if needed
    			if ($data->hasFile('profile_image')) {
    				$profile_image = $data->file('profile_image');
    				$file_path = "users/" . $data->user_id . "/profile-image." . $profile_image->getClientOriginalExtension();
    				$upload_helper = new UploadHelper();
    				$profile_image_url = $upload_helper->upload_to_s3($profile_image, $file_path);
    				$user->profile_image_url = $profile_image_url;
    			}

    			// Update information
    			$user->first_name = $data->first_name;
    			$user->last_name = $data->last_name;
    			$user->username = strtolower($data->username);
    			$user->email = strtolower($data->email);
    			$user->facebook_link = $data->facebook_link;
    			$user->twitter_link = $data->twitter_link;
    			$user->instagram_link = $data->instagram_link;
    			$user->youtube_link = $data->youtube_link;
    			$user->save();

    			return redirect(url('/members/profile/' . $user->id));
    		} else {
    			return redirect(url('/members/profile/' . $user_id));
    		}
    	}
    }
}
