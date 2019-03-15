<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Custom\CourseHelper;

use App\Course;
use App\CourseModule;
use App\CourseEnrollment;
use App\CourseVideo;
use App\User;

class CoursesController extends Controller
{

    public function view_courses() {
        $page_title = "Your Courses";
        $page_header = $page_title;

        // Get courses
        $courses = CourseHelper::getAllCourses();

        return view('members.courses.view-all')->with('page_title', $page_title)->with('page_header', $page_header)->with('courses', $courses);
    }

    public function view_course_dashboard($course_id) {
        $course = Course::find($course_id);
        $page_title = $course->title;
        $page_header = $page_title;

        $course_modules = CourseModule::where('course_id', $course->id)->orderBy('order', 'ASC')->get();

        return view('members.courses.dashboard')->with('course', $course)->with('page_title', $page_title)->with('page_header', $page_header)->with('course_modules', $course_modules);
    }

    public function view_course_video($course_id, $video_id) {
        $course_video = CourseVideo::find($video_id);
        $page_title = $course_video->title;
        $page_header = $page_title;

        return view('members.courses.view-video')->with('course_video', $course_video)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function view_all() {
    	$page_title = "Courses";
    	$page_header = "Courses";

    	// Get courses
    	$courses = Course::where('is_active', 1)->get();

    	return view('admin.courses.view')->with('page_title', $page_title)->with('page_header', $page_header)->with('courses', $courses);
    }

    public function new_course() {
    	$page_title = "Create New Course";
    	$page_header = $page_title;

    	return view('admin.courses.new')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function edit_course($course_id) {
    	$page_title = "Edit Course";
    	$page_header = $page_title;

    	$course = Course::find($course_id);

    	return view('admin.courses.edit')->with('page_title', $page_title)->with('page_header', $page_header)->with('course', $course);
    }

    public function create_course(Request $data) {
    	$course = new Course;
    	$course->title = $data->title;
    	$course->description = $data->description;
    	if (isset($data->preview_video) && ($data->preview_video != "")) {
    		$course->preview_video = $data->preview_video;
    	}
    	$course->amount = $data->amount;
    	$course->save();

    	return redirect(url('/admin/courses'));
    }

    public function read_course($course_id) {
    	$course = Course::find($course_id);
    	$page_title = $course->title;
    	$page_header = $page_title;

    	return view('pages.view-course')->with('page_title', $page_title)->with('page_header', $page_header)->with('course', $course);
    }

    public function update_course(Request $data) {
    	$course = Course::find($data->course_id);
    	$course->title = $data->title;
    	$course->description = $data->description;
    	if (isset($data->preview_video) && ($data->preview_video != "")) {
    		$course->preview_video = $data->preview_video;
    	}
    	$course->amount = $data->amount;
    	$course->save();

    	return redirect(url('/admin/courses'));
    }

    public function delete_course(Request $data) {
    	$course = Course::find($data->course_id);
    	$course->is_active = 0;
    	$course->save();

    	return redirect(url('/admin/courses'));
    }

    public function create_course_module(Request $data) {
    	$module = new CourseModule;
    	$module->title = $data->title;
    	$module->description = $data->description;
    	$module->course_id = $data->course_id;
    	$module->order = $data->order;
    	$module->save();
    }

    public function read_course_module($module_id) {
    	$module = CourseModule::find($module_id);
    	$page_title = $module->title;
    	$page_header = $page_title;
    	return view('pages.view-module')->with('page_title', $page_title)->with('page_header', $page_header)->with('module', $module);
    }

    public function update_course_module(Request $data) {
    	$module = CourseModule::find($data->module_id);
    	$module->title = $data->title;
    	$module->description = $data->description;
    	$module->course_id = $data->course_id;
    	$module->order = $data->order;
    	$module->save();
    }

    public function delete_module(Request $data) {
    	$module = CourseModule::find($data->module_id);
    	$module->is_active = 0;
    	$module->save();

    	return redirect(url('/admin/courses/modules/'));
    }

    public function guest_create_course_enrollment(Request $data) {
        // Create user first
        $user = new User;
        $user->first_name = $data->first_name;
        $user->last_name = $data->last_name;
        $user->username = $data->username;
        $user->email = $data->email;
        $user->password = Hash::make($data->password);
        $user->save();

        // Get course
        $course = Course::find($data->course_id);

        // Check if need to charge
        if ($data->charge_status == 1) {
            $stripe_data = array(
                "amount" => $course->amount,
                "email" => $data->email,
                "card_number" => $data->card_number,
                "ccExpiryMonth" => $data->ccExpiryMonth,
                "ccExpiryYear" => $data->ccExpiryYear,
                "cvvNumber" => $data->cvvNumber,
                "description" => $course->title
            );
            $customer_id = StripeHelper::checkout($stripe_data);
        }

        // Create enrollment
        $enrollment = new CourseEnrollment;
        $enrollment->course_id = $course->id;
        $enrollment->user_id = $user->id;

        // Check to see if there's a customer ID
        if (isset($data->customer_id)) {
            $enrollment->customer_id = $data->customer_id;
        } elseif (isset($customer_id)) {
            $enrollment->customer_id = $customer_id;
        }

        // Check if there's a subscription ID
        if (isset($data->subscription_id)) {
            $enrollment->subscription_id = $data->subscription_id;
        }

        // Misc. data
        $enrollment->purchase_date = Carbon\Carbon::now();
        $enrollment->revenue = $course->amount;

        if (isset($data->recurring)) {
            $enrollment->recurring = $data->recurring;
        } else {
            $enrollment->recurring = 0;
        }
       
        if (isset($data->next_payment_date)) {
            $enrollment->next_payment_date = $data->next_payment_date;
        }

        if (isset($data->status)) {
            $enrollment->status = 1;
        }

        // Redirect
        return redirect(url($data->redirect_url));
    }

    public function create_course_enrollment(Request $data) {
        // Get course
        $course = Course::find($data->course_id);

        // Check if need to charge
        if ($data->charge_status == 1) {
            $stripe_data = array(
                "amount" => $course->amount,
                "email" => Auth::user()->email,
                "card_number" => $data->card_number,
                "ccExpiryMonth" => $data->ccExpiryMonth,
                "ccExpiryYear" => $data->ccExpiryYear,
                "cvvNumber" => $data->cvvNumber,
                "description" => $course->title
            );
            $customer_id = StripeHelper::checkout($stripe_data);
        }

        // Create enrollment
        $enrollment = new CourseEnrollment;
        $enrollment->course_id = $course->id;
        $enrollment->user_id = Auth::id();

        // Check to see if there's a customer ID
        if (isset($data->customer_id)) {
            $enrollment->customer_id = $data->customer_id;
        } elseif (isset($customer_id)) {
            $enrollment->customer_id = $customer_id;
        }
        
        // Check if there's a subscription ID
        if (isset($data->subscription_id)) {
            $enrollment->subscription_id = $data->subscription_id;
        }
        
        // Misc. data
        $enrollment->purchase_date = $data->purchase_date;
        $enrollment->revenue = $course->amount;
        $enrollment->recurring = $data->recurring;
        if (isset($data->next_payment_date)) {
            $enrollment->next_payment_date = $data->next_payment_date;
        }

        if (isset($data->status)) {
            $enrollment->status = 1;
        }

        // Save
        $enrollment->save();

        // Redirect
        return redirect(url($data->redirect_url));
    }

    public function read_course_enrollments($user_id) {
        $enrollments = CourseEnrollment::where('user_id', $user_id)->get();
        $page_title = "Course Enrollments";
        $page_header = $page_title;

        return view('members.course-enrollments')->with('page_title', $page_title)->with('page_header', $page_header)->with('enrollments', $enrollments);
    }

    public function update_course_enrollment(Request $data) {
        $enrollment = CourseEnrollment::find($data->enrollment_id);

        if (isset($data->next_payment_date)) {
            $enrollment->next_payment_date = $data->next_payment_date;
        }
        
        if (isset($data->status)) {
            $enrollment->status = $data->status;
        }
        
        $enrollment->save();

        return redirect(url($data->redirect_url));
    }

    public function delete_course_enrollment(Request $data) {
        $enrollment = CourseEnrollment::find($data->enrollment_id);
        $enrollment->status = 0;
        $enrollment->save();

        return redirect(url($data->redirect_url));
    }

    private function get_modules_for_course($course_id) {
    	$modules = CourseModule::where('course_id', $course_id)->get();
    	return $modules;
    }

    public function create_course_video(Request $data) {
        $course_video = new CourseVideo;
        $course_video->title = $data->title;
        $course_video->description = $data->description;
        $course_video->video_id = $data->video_id;
        $course_video->module_id = $data->module_id;
        $course_video->save();

        return redirect(url($data->redirect_url));
    }

    public function read_course_video($id) {
        $course_video = CourseVideo::find($id);

        $page_title = $course_video->title;
        $page_header = $page_title;

        return view('members.courses.view-video')->with('course_video', $course_video)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function update_course_video(Request $data) {
        $course_video = CourseVideo::find($data->course_video_id);
        $course_video->title = $data->title;
        $course_video->description = $data->description;
        $course_video->video_id = $data->video_id;
        $course_video->module_id = $data->module_id;
        $course_video->save();

        return redirect(url($data->redirect_url));
    }

    public function delete_course_video(Request $data) {
        $course_video = CourseVideo::find($data->course_video_id);
        $course_video->is_active = 0;
        $course_video->save();

        return redirect(url($data->redirect_url));
    }

}
