@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			@if(count($courses) > 0)
				@foreach($courses as $course)
					<div class="col-lg-4 col-md-4 col-sm-6 col-12">
						@if(CourseHelper::isEnrolledInCourse(Auth::id(), $course->id))
						<a href="/members/courses/{{ $course->id }}/dashboard">
						@else
						<a href="/members/courses/{{ $course->id }}">
						@endif
						
							<div class="gray-box">
								<h3 class="text-center">{{ $course->title }}</h3>
								<p class="text-center mb-0">{{ $course->description }}</p>
								@if(CourseHelper::isEnrolledInCourse(Auth::id(), $course->id))
									<a class="genric-btn primary rounded centered" href="/members/courses/{{ $course->id }}/dashboard">Go to Course</a>
								@else
									<a class="genric-btn success rounded centered" href="/members/courses/{{ $course->id }}">Enroll for ${{ $course->amount }}</a>
								@endif
							</div>
						</a>
					</div>
				@endforeach
			@else
				<div class="col-12">
					<div class="gray-box">
						<h5 class="text-center">No courses available...</h5>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection