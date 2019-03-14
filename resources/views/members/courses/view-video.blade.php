@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="gray-box">
					<ol>
						@foreach($course_module as $module)
							<li>{{ $module->title }}</li>
							<?php $module_videos = CourseHelper::getVideosForModule($module->id); ?>
							@if(count($module_videos) > 0)
								<ul>
								@foreach($module_videos as $module_video)
									<li><a href="/members/courses/{{ $course->id }}/watch/{{ $module_video->id }}">{{ $module_video->title }}</a></li>
								@endforeach
								</ul>
							@endif
						@endforeach
					</ol>
				</div>
			</div>

			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				<div class="videoWrapper mb-32">
				    <!-- Copy & Pasted from YouTube -->
				    <iframe width="560" height="349" src="https://www.youtube.com/embed/{{ $course_video->video }}?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
				</div>
				<h3>{{ $course_video->title }}</h3>
				<hr />
				<p class="mb-0">{{ $course_video->description }}</p>
				<hr />
				<p class="mb-0">Views: {{ $course_video->views }}</p>
				<p class="mb-0"><strong>Created on {{ $course_video->created_at->format('M jS, Y') }}</strong></p>
			</div>
		</div>
	</div>
@endsection