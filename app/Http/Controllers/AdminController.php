<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
    	$page_header = "Admin Login";
    	$page_title = $page_header;

    	return view('admin.login')->with('page_header', $page_header)->with('page_title', $page_title);
    }

    public function dashboard() {
    	$page_header = "Admin Dashboard";
    	$page_title = $page_header;

    	return view('admin.dashboard')->with('page_header', $page_header)->with('page_title', $page_title);
    }
}
