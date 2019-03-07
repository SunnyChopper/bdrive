<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\CourseModule;

class CoursesController extends Controller
{
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

    public function update_course(Request $data) {
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

    private function get_modules_for_course($course_id) {
    	$modules = CourseModule::where('course_id', $course_id)->get();
    	return $modules;
    }

}
