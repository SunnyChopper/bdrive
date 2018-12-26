@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64 mt-32-mobile mb-32-mobile">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="gray-box">
					<h4 class="text-center">Performance Summary</h4>
					<p class="text-center"><b>Note:</b> Under construction. Not valid numbers.</p>
					<hr />

					<div class="row mt-32">
						<div class="col-lg-4 col-md-4 col-sm-4 col-4">
							<h5 class="text-center">8</h5>
							<p class="mb-0 text-center"><small>New Users Today</small></p>
						</div>


						<div class="col-lg-4 col-md-4 col-sm-4 col-4">
							<h5 class="text-center">16</h5>
							<p class="mb-0 text-center"><small>Returning Users Today</small></p>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-4">
							<h5 class="text-center">4</h5>
							<p class="mb-0 text-center"><small>New Customers Today</small></p>
						</div>
					</div>

					<div class="row mt-32">
						<div class="col-lg-4 col-md-4 col-sm-4 col-4">
							<h5 class="text-center">$143.43</h5>
							<p class="mb-0 text-center"><small>Today's Revenue</small></p>
						</div>


						<div class="col-lg-4 col-md-4 col-sm-4 col-4">
							<h5 class="text-center">$1,435.65</h5>
							<p class="mb-0 text-center"><small>Week's Revenue</small></p>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-4">
							<h5 class="text-center">$205.09</h5>
							<p class="mb-0 text-center"><small>Average per Day</small></p>
						</div>
					</div>

					<div class="row mt-32">
						<div class="col-lg-4 col-md-4 col-sm-4 col-4">
							<h5 class="text-center">4,832</h5>
							<p class="mb-0 text-center"><small>Blog Post Views Today</small></p>
						</div>


						<div class="col-lg-4 col-md-4 col-sm-4 col-4">
							<h5 class="text-center">5</h5>
							<p class="mb-0 text-center"><small>Users From Blog Today</small></p>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-4">
							<h5 class="text-center">2</h5>
							<p class="mb-0 text-center"><small>Posts From Guests</small></p>
						</div>
					</div>

					<div class="row mt-32">
						<a class="center-button btn btn-primary" href="">View Full Statistics</a>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<h3 class="text-center mt-32-mobile">Quick Actions</h3>


				<div class="row mt-32">
					<div class="col-lg-6 col-md-6 col-sm-6 col-6">
						<a href="/admin/posts/new">
							<div class="color-box color-box-blue">
								<div class="color-box-content">
									<div class="content-wrapper">
										<div class="content">
											<span class="icon icon-book"></span>
											<h5 class="text-center">New Blog Post</h5>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-6">
						<a href="/admin/lead-magnets/new">
							<div class="color-box color-box-blue">
								<div class="color-box-content">
									<div class="content-wrapper">
										<div class="content">
											<span class="icon icon-magnet"></span>
											<h5 class="text-center">New Lead Magnet</h5>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection