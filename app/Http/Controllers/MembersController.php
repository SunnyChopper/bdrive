<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

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
}
