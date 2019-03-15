<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\BlogPostHelper;
use App\Custom\CourseHelper;

use App\Notifications\NewUser;

use App\User;
use App\Course;

use Mail;

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

    public function submit_contact(Request $data) {
        $to_name = "Billionaires Drive";
        $to_email = env('MAIL_USERNAME');

        $data = array('name' => $data->name, 'email' => $data->email, 'category' => $data->category, 'body' => $data->message);

        Mail::send('emails.contact-email', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name);
            $message->from(env('MAIL_USERNAME'), "BillionairesDrive");
            $message->subject('🚨 New Contact Form Submission 🚨');
        });

        return redirect()->back()->with('success', 'Successfully submitted.');
    }

    public function blog() {
        // Dynamic page features
        $page_title = "Blog";
        $page_header = $page_title;

        // Get posts
        $blog_post_helper = new BlogPostHelper();
        $posts = $blog_post_helper->get_all_with_pagination(10);

        return view('pages.blog')->with('page_title', $page_title)->with('page_header', $page_header)->with('posts', $posts);
    }

    public function view_post($post_id, $slug) {
        // Get posts
        $blog_post_helper = new BlogPostHelper($post_id);
        $post = $blog_post_helper->read();

        // Dynamic page features
        $page_title = $post->title;
        $page_header = $page_title;

        return view('pages.view-post')->with('page_title', $page_title)->with('page_header', $page_header)->with('post', $post);
    }

    public function courses() {
        // Dynamic page features
        $page_header = "Courses";
        $page_title = $page_header;

        // Get courses
        $courses = CourseHelper::getAllCourses();

        return view('pages.courses')->with('page_header', $page_header)->with('page_title', $page_title)->with('courses', $courses);
    }

    public function view_course($course_id) {
        // Get course
        $course = Course::find($course_id);
        $page_title = $course->title;
        $page_header = $page_title;
        return view('pages.view-course')->with('page_header', $page_header)->with('page_title', $page_title)->with('course', $course);
    }

    public function free_course() {
        // Dynamic page features
        $page_header = "Free Intro Course";
        $page_title = $page_header;

        return view('pages.free-course')->with('page_header', $page_header)->with('page_title', $page_title);
    }
}
