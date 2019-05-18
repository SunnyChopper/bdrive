<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Custom\UsersHelper;
use App\PublicCourseVideo;
use App\PublicCourse;
use App\PublicCourseForum;
use App\PublicCourseForumComment;

class PublicCoursesController extends Controller
{
    public function new() {
        if (UsersHelper::isAdmin() == false) {
            return redirect(url('/admin'));
        }

        $page_title = "Create New Public Course";
        $page_header = $page_title;

        return view('admin.public-courses.courses.new')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function create(Request $data) {
        $public_course = new PublicCourse;
        $public_course->title = $data->title;
        $public_course->description = $data->description;

        if (isset($data->image_url)) {
            $public_course->image_url = $data->image_url;
        }

        if (isset($data->video_url)) {
            $public_course->video_url = $data->video_url;
        }

        $public_course->save();

        return redirect(url('/admin/public-courses/view'));
    }

    public function course_dashboard($public_course_id) {
        if (Auth::guest()) {
            return redirect(url('/login?redirect_action=/members/public-courses/view/'.$public_course_id));
        }

        $course = PublicCourse::find($public_course_id);
        $videos = PublicCourseVideo::where('course_id', $public_course_id)->orderBy('created_at', 'DESC')->limit(5)->get();
        $forums = PublicCourseForum::where('course_id', $public_course_id)->orderBy('created_at', 'DESC')->limit(5)->get();

        $page_title = $course->title;
        $page_header = $page_title;

        return view('members.public-courses.dashboard')->with('course', $course)->with('videos', $videos)->with('forums', $forums)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function course_videos($public_course_id) {
        $course = PublicCourse::find($public_course_id);
        $videos = PublicCourseVideo::where('course_id', $public_course_id)->orderBy('created_at', 'DESC')->get();

        $page_title = "All Videos";
        $page_header = $page_title;

        return view('members.public-courses.all-videos')->with('course', $course)->with('videos', $videos)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function new_forum($public_course_id) {
        $course = PublicCourse::find($public_course_id);

        $page_title = "Create New Forum";
        $page_header = $page_title;

        return view('members.public-courses.forums.new')->with('course', $course)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function view_forum($public_course_id, $forum_id) {
        $course = PublicCourse::find($public_course_id);
        $forum = PublicCourseForum::find($forum_id);
        $comments = PublicCourseForumComment::where('forum_id', $forum->id)->get();

        $page_title = $forum->title;
        $page_header = $page_title;

        return view('members.public-courses.forums.view')->with('course', $course)->with('forum', $forum)->with('comments', $comments)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function view_all() {
        if (UsersHelper::isAdmin() == false) {
            return redirect(url('/admin'));
        }

        $courses = PublicCourse::where('is_active', 1)->get();

        $page_title = "Public Courses";
        $page_header = $page_title;

        return view('admin.public-courses.courses.view')->with('courses', $courses)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function view_courses() {
        $courses = PublicCourse::where('is_active', 1)->get();

        $page_title = "Public Courses";
        $page_header = $page_title;

        return view('pages.public-courses')->with('courses', $courses)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function read($public_course_id) {
        $course = PublicCourse::find($public_course_id);

        $page_title = $course->title;
        $page_header = $page_title;

        return view('pages.view-public-course')->with('course', $course)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function edit($public_course_id) {
        if (UsersHelper::isAdmin() == false) {
            return redirect(url('/admin'));
        }

        $course = PublicCourse::find($public_course_id);

        $page_title = "Edit Public Course";
        $page_header = $page_title;

        return view('admin.public-courses.courses.edit')->with('course', $course)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function update(Request $data) {
        $public_course = PublicCourse::find($data->public_course_id);
        $public_course->title = $data->title;
        $public_course->description = $data->description;

        if (isset($data->image_url)) {
            $public_course->image_url = $data->image_url;
        }

        if (isset($data->video_url)) {
            $public_course->video_url = $data->video_url;
        }

        $public_course->save();

        return redirect(url('/admin/public-courses/view'));
    }

    public function delete(Request $data) {
        $public_course = PublicCourse::find($data->public_course_id);
        $public_course->is_active = 0;
        $public_course->save();

        return redirect(url('/admin/public-courses/view'));
    }
}
