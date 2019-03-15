@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64 mt-32-mobile mb-32-mobile">
		<div class="row">
			@foreach($courses as $course)
				<div class="col-lg-4 col-md-4 col-sm-6 col-12">
					<a href="/courses/{{ $course->id }}">
						<div class="image-box-edge" >
							<div class="image-box-info">
								<h5>{{ $course->title }}</h5>
								@if($course->amount == 0.00)
									<h6>Price: <span class="green">Free</span></h6>
								@else
									<h6>Price: ${{ $course->amount }}</h6>
								@endif
								<hr />
								<p class="mb-0">{{ $course->description }}</p>
							</div>
						</div>
					</a>
				</div>
			@endforeach

			<div class="col-lg-4 col-md-4 col-sm-6 col-12">
				<a href="/free-course">
					<div class="image-box-edge" >
						<div class="image-box-info">
							<h5>Instagram Mastery Intro</h5>
							<h6>Price: <span class="green">Free</span></h6>
							<hr />
							<p class="mb-0">Learn the basics of getting started with an Instagram business and learn how all of the puzzle pieces fit together.</p>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
@endsection
