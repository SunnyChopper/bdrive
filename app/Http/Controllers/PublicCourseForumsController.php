<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\PublicCourseForum;

class PublicCourseForumsController extends Controller
{
    public function create(Request $data) {
        $forum = new PublicCourseForum;
        $forum->course_id = $data->course_id;
        $forum->user_id = Auth::id();
        $forum->title = $data->title;
        $forum->description = $data->description;
        $forum->save();

        return redirect(url('/members/public-courses/' . $data->course_id . '/forums/' . $forum->id));
    }

    public function read($forum_id) {
        $forum = PublicCourseForum::find($forum_id);

        $page_title = $forum->title;
        $page_header = $page_title;

        return redirect(url('/members/public-courses/' . $data->course_id . '/forums/' . $forum->id));
    }

    public function delete(Request $data) {
        $forum = PublicCourseForum::find($data->forum_id);
        $forum->is_active = 0;
        $forum->save();

        return redirect(url('/members/public-courses/' . $data->course_id . '/forums/'));
    }
}
