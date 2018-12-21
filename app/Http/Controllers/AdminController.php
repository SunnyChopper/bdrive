<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
    	$page_header = "Admin Login";

    	return view('admin.login')->with('page_header', $page_header);
    }
}
