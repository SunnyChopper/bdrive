@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<h4>Latest Videos</h4>
				<hr />
				<ul class="list-group">
					@foreach($videos as $video)
					<a href="/members/public-courses/video/{{ $video->id }}">
						<li class="list-group-item">
							<h5>{{ $video->title }}</h5>
							<p class="mb-0">{{ substr($video->description, 0, 120) }}</p>
						</li>
					</a>
					@endforeach
				</ul>

				@if(count($videos) == 5)
				<a href="/members/public-courses/{{ $course->id }}/videos" class="btn btn-primary centered mt-16">View All Videos</a>
				@endif
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-32-mobile">
				<div class="gray-box">
					<h4>Latest Forums</h4>
					@if(count($forums) > 0)
					<p><a href="/members/public-courses/{{ $course->id }}/forums/new" class="btn btn-primary">Create Forum</a></p>
					@endif

					@if(count($forums) > 0)
					<ul class="list-group">
						@foreach($forums as $forum)
						<li class="list-group-item">
							<h6>{{ $forum->title }}</h6>
							<p class="mb-2">{{ substr($forum->description, 0, 120) }}</p>
							<a href="/members/public-courses/{{ $course->id }}/forums/{{ $forum->id }}">View Forum</a>
						</li>
						@endforeach
					</ul>

					@else
					<p>No forums created for this public course. Click below to create the first one.</p>
					<a href="/members/public-courses/{{ $course->id }}/forums/new" class="btn btn-primary">Create Forum</a>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection