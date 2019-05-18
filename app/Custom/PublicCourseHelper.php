<?php

namespace App\Custom;

use App\PublicCourse;
use App\PublicCourseComment;
use App\PublicCourseEnrollment;
use App\PublicCourseForum;
use App\PublicCourseForumComment;
use App\PublicCourseVideo;

class PublicCourseHelper {

	public static function getVideosForCourse($course_id) {
		return PublicCourseVideo::where('course_id', $course_id)->get();
	}

	public static function numberEnrolledInCourse($course_id) {
		return PublicCourseEnrollment::where('course_id', $course_id)->count();
	}

	public static function getForumsForCourse($course_id) {
		return PublicCourseForum::where('course_id', $course_id)->get();
	}

	public static function getCommentsForVideo($video_id) {
		return PublicCourseComment::where('video_id', $video_id)->get();
	}

	public static function getCommentsForForum($forum_id) {
		return PublicCourseForumComment::where('forum_id', $forum_id)->get();
	}

	public static function hasUserCommentedOnVideo($user_id, $video_id) {
		if (PublicCourseComment::where('user_id', $user_id)->where('video_id', $video_id)->count() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public static function getUserCommentOnVideo($user_id, $video_id) {
		return PublicCourseComment::where('user_id', $user_id)->where('video_id', $video_id)->first();
	}

	public static function isUserEnrolledInCourse($course_id, $user_id) {
		if (PublicCourseEnrollment::where('course_id', $course_id)->where('user_id', $user_id)->count() > 0) {
			return true;
		} else {
			return false;
		}
	}

}

?>