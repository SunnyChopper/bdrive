<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\BlogPostHelper;

use App\User;

use Auth;
use Hash;
use Session;

class AdminController extends Controller
{
    public function index() {
        // Dynamic page features
    	$page_header = "Admin Login";
    	$page_title = $page_header;

        // Check if needed to redirect
        $redirect_code = $this->redirect_admin();
        if ($redirect_code == 1) {
            $this->login_admin();
            return redirect(url('/admin/dashboard/'));
        } elseif ($redirect_code == 2) {
            return redirect(url('/members/dashboard/'));
        }

    	return view('admin.login')->with('page_header', $page_header)->with('page_title', $page_title);
    }

    public function authenticate_user(Request $data) {
        // Get data
        $username = $data->username;
        $password = $data->password;

        // Get User object
        if (User::where('username', strtolower($username))->count() > 0) {
            $user = User::where('username', strtolower($username))->first();
            $hashed_pwd = Hash::make($password);
            $user_data = array(
                'username' => $username,
                'password' => $password
            ); 
            if (Auth::attempt($user_data)) {
                // Check for backend auth
                if ($user->backend_auth == 0) {
                    return redirect()->back()->with('admin_login_error', 'You are not authorized to access this area.');
                } else {
                    $this->login_admin();
                    return redirect(url('/admin/dashboard'));
                }
            } else {
                return redirect()->back()->with('admin_login_error', 'Password is incorrect.');
            }
        } else {
            return redirect()->back()->with('admin_login_error', 'Username does not exist.');
        }
    }

    public function dashboard() {
        // Dynamic page features
    	$page_header = "Admin Dashboard";
    	$page_title = $page_header;

        // Protect admin backend
        $this->protect();

    	return view('admin.dashboard')->with('page_header', $page_header)->with('page_title', $page_title);
    }

    public function view_blog_posts() {
        // Page data
        $page_header = "Blog Posts";

        // Protect admin backend
        $this->protect();

        // Get blog posts
        $blog_post_helper = new BlogPostHelper();
        $posts = $blog_post_helper->get_all_from_author(Auth::id());

        return view('admin.posts.view')->with('page_header', $page_header)->with('posts', $posts);
    }

    public function new_blog_post() {
        // Page data
        $page_header = "New Blog Post";

        // Protect admin backend
        $this->protect();

        return view('admin.posts.new')->with('page_header', $page_header);
    }

    public function edit_blog_post($post_id) {
        // Page data
        $page_header = "Edit Blog Post";

        // Protect admin backend
        $this->protect();

        // Get post
        $blog_helper = new BlogPostHelper($post_id);
        $post = $blog_helper->read();

        return view('admin.posts.edit')->with('page_header', $page_header)->with('post', $post);
    }

    public function logout() {
        Session::forget('admin_login');
        Session::forget('admin_switch');
        Session::forget('backend_auth');
        Session::save();

        return redirect(url('/'));
    }

    /* Private functions */
    private function protect() {
        // Check to see if already logged in
        if (Session::has('admin_login')) {
            if (Session::get('admin_login') == false) {
                return redirect(url('/admin'));
            }
        } else {
            return redirect(url('/admin'));
        }
    }

    private function login_admin() {
        $user = Auth::user();
        $backend_auth = $user->backend_auth;

        Session::put('admin_login', true);
        Session::put('admin_switch', false);
        Session::put('backend_auth', $backend_auth);
        Session::save();
    }


    private function redirect_admin() {
        if (Auth::guest()) {
            return 0;
        } else {
            if (Auth::user()->backend_auth == 0) {
                return 2;
            } else {
                return 1;
            }
        }
    }
}
