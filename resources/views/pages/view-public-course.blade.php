@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				@if($course->video_url != "")
				<div class="videoWrapper">
					<iframe width="560" height="349" src="http://www.youtube.com/embed/{{ $course->video_url }}?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
				</div>
				@elseif($course->image_url != "")
				<img src="{{ $course->image_url }}" class="regular-image">
				@endif

				<h3 class="mt-32">{{ $course->title }}</h3>
				<p>{{ $course->description }}</p>

				@if($course->enrolled > 25)
				<p><strong>Enrolled:</strong> {{ $course->enrolled }}</p>
				@endif
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-32-mobile">
				<div class="gray-box">
					<h5 class="text-center">Enroll in Course</h5>
					<hr />
					@if(Auth::guest())
					<p class="text-center">In order to enroll in this free public course, you must first register a new account. Click below to get started.</p>
					<a href="/register?redirect_action=/public-courses/enroll/{{ $course->id }}" class="btn btn-success centered">Register and Enroll</a>
					<p class="text-center mt-16">If you already have an account, hit the login button below!</p>
					<a href="/login?redirect_action=/members/public-courses/view/{{ $course->id }}" class="btn btn-primary centered">Login and Enroll</a>
					@elseif(\App\Custom\PublicCourseHelper::isUserEnrolledInCourse($course->id, Auth::id()))
					<p>You are already enrolled in this course. Click below to view the course dashboard.</p>
					<a href="/members/public-courses/view/{{ $course->id }}" class="btn btn-primary centered">Go to Dashboard</a>
					@else
					<p>Learn and earn points that can be used towards other paid courses and other services.</p>
					<a href="/public-courses/enroll/{{ $course->id }}" class="btn btn-success centered">Begin the Course</a>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection