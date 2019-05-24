<?php

namespace App\Custom;

use Illuminate\Support\Facades\Session;
use Auth;
use App\User;

class UsersHelper {
	
	public static function addPoints($user_id, $points) {
		$user = User::find($user_id);
		$user->points = $user->points + $points;
		$user->save();

		return true;
	}

	public static function getPoints($user_id) {
		$user = User::find($user_id);
		return $user->points;
	}

	public static function getUser($user_id) {
		return User::find($user_id);
	}

	public static function getUsername($user_id) {
		return User::find($user_id)->username;
	}

	public static function logoutAdmin() {
		Auth::logout();
		Session::forget('admin_login');
		Session::forget('backend_auth');
		Session::save();
	}

	public static function logoutUser() {
		Auth::logout();
	}

	public static function isAdmin() {
		if (Session::has('admin_login')) {
            if (Session::get('admin_login') == false) {
                return false;
            } else {
            	return true;
            }
        } else {
            return false;
        }
	}

}

?>