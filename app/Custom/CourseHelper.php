<?php

namespace App\Custom;

use App\CourseEnrollment;
use App\Course;
use App\CourseGrade;
use App\CourseVideo;
use App\CourseQuiz;

class CourseHelper {

	private $id;

	public function __construct($id = 0) {
		$this->id = $id;
	}

	public static function isEnrolledForCourse($user_id, $course_id) {
		if (CourseEnrollment::where('user_id', $user_id)->where('course_id', $course_id)->count() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public static function getAllCourses() {
		return Course::where('is_active', 1)->get();
	}

	public static function getCourseGrade($user_id, $course_id) {
		if (CourseGrade::where('user_id', $user_id)->where('course_id', $course_id)->count() == 0) {
			return 0.00;
		} else {
			$course_grades = CourseGrade::where('user_id', $user_id)->where('course_id', $course_id)->get();
			$num_grades = 0;
			$total_score = 0;
			foreach ($course_grades as $grade) {
				$total_score += $grade->score;
				$num_grades++;
			}
			return $total_score / $num_grades;
		}
	}

	public static function getQuizGrade($user_id, $quiz_id) {
		if (CourseGrade::where('user_id', $user_id)->where('quiz_id', $quiz_id)->count() == 0) {
			return 0.00;
		} else {
			$grade = CourseGrade::where('user_id', $user_id)->where('quiz_id', $quiz_id)->get();
			return $grade->score;
		}
	}

	public static function getVideosForModule($module_id) {
		return CourseVideo::where('module_id', $module_id)->get();
	}

	public static function getQuizzesForModule($module_id) {
		return CourseQuiz::where('module_id', $module_id)->get();
	}
}

?>