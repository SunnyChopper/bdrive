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
				<a href="">
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
								<h5 class="text-center">View Software Tools</h5>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-4 col-sm-6 col-6">
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
			</div>

			<div class="col-lg-3 col-md-4 col-sm-6 col-6">
				<div class="color-box color-box-blue">
					<div class="color-box-content">
						<div class="content-wrapper">
							<div class="content">
								<span class="icon icon-users"></span>
								<h5 class="text-center">Access Community</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div style="" class="gray-row">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8 col-sm-10 col-12">
					<h3 class="text-center aos-init aos-animate" data-aos="fade-up" style="font-family: 'Quicksand', sans-serif;">Recent Blog Posts</h3>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<div class="background-card set-bg mt-16" data-setbg="https://zdnet2.cbsistatic.com/hub/i/2018/03/13/caa74f32-b8d3-4517-965f-659384beea88/a42105d0dcf45a120aaff0c06c64490f/ai-image.png">
						<div class="card-overlay">
							<div class="card-footer">
								<h5>How AI Can Help Supercharge Your Business</h5>
								<a href="">Read More</a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<div class="background-card set-bg mt-16" data-setbg="https://fortunedotcom.files.wordpress.com/2018/05/instagram-share-posts-stories.jpg">
						<div class="card-overlay">
							<div class="card-footer">
								<h5>6 Tips for Growing on Instagram</h5>
								<a href="">Read More</a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<div class="background-card set-bg mt-16" data-setbg="https://cdn2.hubspot.net/hubfs/3365633/Imported_Blog_Media/millennials.jpg">
						<div class="card-overlay">
							<div class="card-footer">
								<h5>Why Starting an Online Business is the Future</h5>
								<a href="">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection