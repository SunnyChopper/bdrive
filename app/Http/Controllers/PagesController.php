<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
    	// Dynamic page elements
    	$page_title = "Home";

    	return view('pages.index')->with('page_title', $page_title);
    }

    public function contact() {
    	// Dynamic page elements
    	$page_title = "Contact";
    	$page_header = $page_title;

    	return view('pages.contact')->with('page_title', $page_title)->with('page_header', $page_header);
    }
}
