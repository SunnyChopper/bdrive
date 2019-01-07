<?php

use Illuminate\Http\Request;

use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/username/check', function(Request $data) {
	if (User::where('username', strtolower($data->username))->count() > 0) {
		$data = [
			"status" => "200",
			"check" => "unavailable"
		];

		return response()->json($data);
	} else {
		$data = [
			"status" => "200",
			"check" => "available"
		];

		return response()->json($data);
	}
});

Route::post('/email/check', function(Request $data) {
	if (User::where('email', strtolower($data->email))->count() > 0) {
		$data = [
			"status" => "200",
			"check" => "unavailable"
		];

		return response()->json($data);
	} else {
		$data = [
			"status" => "200",
			"check" => "available"
		];

		return response()->json($data);
	}
});
