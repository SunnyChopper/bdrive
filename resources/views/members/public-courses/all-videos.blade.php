@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h4><a href="/members/public-courses/view/{{ $course->id }}">Back to Dashboard</a></h4>
				<hr />
				<ul class="list-group">
					@foreach($videos as $video)
					<a href="/members/public-courses/video/{{ $video->id }}">
						<li class="list-group-item" style="padding: 24px;">
							<h4>{{ $video->title }}</h4>
							<p class="mb-0">{{ substr($video->description, 0, 120) }}</p>
						</li>
					</a>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endsection