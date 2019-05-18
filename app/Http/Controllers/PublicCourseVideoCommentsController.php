<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\PublicCourseComment;
use App\Custom\UsersHelper;

class PublicCourseVideoCommentsController extends Controller
{
    public function create(Request $data) {
        $comment = new PublicCourseComment;
        $comment->user_id = Auth::id();
        $comment->video_id = $data->public_video_id;
        $comment->comment = $data->comment;
        $comment->save();

        // Add points
        UsersHelper::addPoints(Auth::id(), 5);

        return redirect()->back();
    }

    public function delete(Request $data) {
        $comment = PublicCourseComment::find($data->comment_id);
        $comment->is_active = 0;
        $comment->save();

        return redirect()->back();
    }
}
