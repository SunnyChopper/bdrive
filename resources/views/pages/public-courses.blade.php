@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				<ul class="list-group">
					@foreach($courses as $course)
					<li class="list-group-item" style="padding: 24px;">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-32-mobile">
								@if($course->image_url != "" || $course->video_url != "")
									@if($course->video_url != "")
										<div class="videoWrapper">
											<iframe width="560" height="349" src="http://www.youtube.com/embed/{{ $course->video_url }}?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
										</div>
									@else
										<img src="{{ $course->image_url }}" class="regular-image">
									@endif
								@endif
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<h4>{{ $course->title }}</h4>
								<p>{{ substr($course->description, 0, 120) }}...</p>
								<a href="/public-courses/{{ $course->id }}" class="btn btn-primary">View Details</a>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endsection