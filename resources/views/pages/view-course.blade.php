@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-8 col-sm-10 col-12">
				@if($course->preview_video != "")
					<div class="videoWrapper">
					    <!-- Copy & Pasted from YouTube -->
					    <iframe width="560" height="349" src="http://www.youtube.com/embed/{{ $course->preview_video }}?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
					</div>
				@endif

				<h3 class="text-center">Price: ${{ sprintf("%.2f", $course->amount) }}</h3>
				<hr />
				<p class="text-center">{{ $course->description }}</p>
				<div class="gray-box mt-64">
					<form action="/courses/enroll/" method="POST">
						<input type="hidden" name="course_id" value="{{ $course->id }}">
						<input type="hidden" name="redirect_url" value="/members/courses/{{ $course->id }}/dashboard">
						@if($course->amount > 0.00)
							<input type="hidden" name="charge_status" value="1">
						@else
							<input type="hidden" name="charge_status" value="0">
							<h4 class="text-center">Enroll for Free</h4>
							<p class="text-center">Get started by creating an account for free.</p>
							<hr />
						@endif

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>First Name:</label>
									<input type="text" name="first_name" class="form-control" required>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Last Name:</label>
									<input type="text" name="last_name" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Username:</label>
									<input type="text" name="username" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Email:</label>
									<input type="email" name="email" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Password:</label>
									<input type="password" name="password" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row mt-16">
							<div class="col-12">
								<input type="submit" value="Enroll for Free" id="enroll_button" class="btn btn-success centered">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(document).ready(function() {
			$("input[name=username]").on('change', function() {
				console.log($(this).val());
				$.ajax({
					url: '/api/username/check',
					method: 'GET',
					data: {

					}
				});
			});
		});
	</script>
@endsection