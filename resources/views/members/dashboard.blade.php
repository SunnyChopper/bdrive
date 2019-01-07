@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64 mt-32-mobile mb-32-mobile">
		<div class="row">
			<div class="col-12">
				<h3 style="font-family: 'Quicksand', sans-serif;">Welcome {{ $user->first_name }}</h3>
				<hr />
			</div>
		</div>

		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-6 col-6">
				<a href="/courses">
					<div class="color-box color-box-blue">
						<div class="color-box-content">
							<div class="content-wrapper">
								<div class="content">
									<span class="icon icon-book"></span>
									<h5 class="text-center">View Courses</h5>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-3 col-md-4 col-sm-6 col-6">
				<div class="color-box color-box-blue">
					<div class="color-box-content">
						<div class="content-wrapper">
							<div class="content">
								<span class="icon icon-desktop"></span>
								<h5 class="text-center mb-0">View Software Tools</h5>
								<p class="text-center mb-0"><small>(Coming Soon)</small></p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-4 col-sm-6 col-6">
				<a href="/members/content-bank/view">
					<div class="color-box color-box-blue">
						<div class="color-box-content">
							<div class="content-wrapper">
								<div class="content">
									<span class="icon icon-camera"></span>
									<h5 class="text-center">Access ContentBank&#8482;</h5>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-3 col-md-4 col-sm-6 col-6">
				<div class="color-box color-box-blue">
					<div class="color-box-content">
						<div class="content-wrapper">
							<div class="content">
								<span class="icon icon-users"></span>
								<h5 class="text-center mb-0">Access Community</h5>
								<p class="text-center mb-0"><small>(Coming Soon)</small></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@if(count($posts) > 0)
		<div style="" class="gray-row">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 col-md-8 col-sm-10 col-12">
						<h3 class="text-center aos-init aos-animate" data-aos="fade-up" style="font-family: 'Quicksand', sans-serif;">Recent Blog Posts</h3>
					</div>
				</div>

				<div class="row">
					@foreach($posts as $post)
						<div class="col-lg-6 col-md-6 col-sm-6 col-12">
							<a href="/post/{{ $post->id }}/{{ $post->slug }}">
								<div class="background-card set-bg mt-16" data-setbg="{{ $post->featured_image_url }}">
									<div class="card-overlay">
										<div class="card-footer">
											<h5>{{ $post->title }}</h5>
											<p class="mb-0">Read More</p>
										</div>
									</div>
								</div>
							</a>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	@endif
@endsection