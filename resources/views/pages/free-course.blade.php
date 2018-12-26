@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	@include('pages.modals.free-course-notifications')

	<div class="container mt-64 mb-64 mt-32-mobile mb-32-mobile">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<img src="https://drflkq9jqzld5.cloudfront.net/sites/default/files/main/articles/2018/07/07/instagram-phone-icon.jpg" class="regular-image light-shadow">
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-32-mobile">
				<h4>Instagram Mastery Intro</h4>
				<h5>Price: <span class="green">Free</span></h5>
				<hr />
				<p>This course will help you understand what Instagram is and what it can do for your business. You will know how all of the puzzle pieces fit together to create a profitable Instagram business. You will learn the following at a high abstract level:</p>
				<ul>
					<li>Entrepreneurial mindsets</li>
					<li>Picking a niche</li>
					<li>Market research</li>
					<li>Purpose of content</li>
				</ul>
				<a href="/register?redirect_url=/courses/1/dashboard" class="btn btn-success enroll_course_button">Enroll in Course</a>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(".enroll_course_button").on('click', function(e) {
			// Prevent button from clicking
			e.preventDefault();

			// Show modal
			$("#free_course_modal").modal();
		});
	</script>
@endsection