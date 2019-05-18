<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\PublicCourseForumComment;

class PublicCourseForumCommentsController extends Controller
{
    public function create(Request $data) {
        $comment = new PublicCourseForumComment;
        $comment->forum_id = $data->forum_id;
        $comment->user_id = Auth::id();
        $comment->comment = $data->comment;
        $comment->save();

        return redirect()->back();
    }

    public function delete(Request $data) {
        $comment = PublicCourseForumComment::find($data->comment_id);
        $comment->is_active = 0;
        $comment->save();
    }
}
