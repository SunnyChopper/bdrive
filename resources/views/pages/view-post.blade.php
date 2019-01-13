@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64">
		<div class="row mb-32">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-xs-12">
				<img src="{{ $post->featured_image_url }}" class="regular-image">
			</div>
		</div>

		<div class="row mb-32">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
				<div class="gray-box">
					<h5 class="text-center">Join Others in Getting Exclusive Tips & Advice</h5>
					<p class="text-center mt-2">If you're serious about learning how to take your coding skills to the next level and become a tech entrepreneur, then this is the newsletter that you need.</p>
					<form id="top-newsletter-form">
						<input type="hidden" id="top-source" value="Blog Post" name="source">
						<input type="hidden" id="top-list_name" value="general" name="list_name">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-12 col-12">
								<input type="text" id="top-first_name" name="first_name" placeholder="First Name" class="form-control mt-8-mobile" required>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-12 col-12">
								<input type="text" id="top-last_name" name="last_name" placeholder="Last Name" class="form-control mt-8-mobile" required>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-12 col-12">
								<input type="email" id="top-email" name="email" placeholder="Email" class="form-control mt-8-mobile" required>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-12 col-12 mt-8-mobile" style="display: flex;">
								<input type="submit" id="top-submit" value="Join" class="btn btn-primary center-button mt-8-mobile" style="width: 100%; margin-top: auto; margin-bottom: auto;" required>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<p class="green text-center mb-0 mt-2" style="display: none;" id="feedback-top"></p>
							</div>
						</div>
					</form>
				</div>	
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-xs-12">
				<div id="post-body">
					{!! $post->body !!}
				</div>
			</div>
		</div>

		<div class="row mt-16">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
				<div class="gray-box">
					<h5 class="text-center">Join Others in Getting Exclusive Tips & Advice</h5>
					<p class="text-center mt-2">If you're serious about learning how to take your coding skills to the next level and become a tech entrepreneur, then this is the newsletter that you need.</p>
					<form id="bottom-newsletter-form" action="/newsletter/submit" method="post">
						<input type="hidden" id="bottom-source" value="Blog Post" name="source">
						<input type="hidden" id="bottom-list_name" value="general" name="list_name">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-12 col-12">
								<input type="text" id="bottom-first_name" name="first_name" placeholder="First Name" class="form-control mt-8-mobile" required>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-12 col-12">
								<input type="text" id="bottom-last_name" name="last_name" placeholder="Last Name" class="form-control mt-8-mobile" required>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-12 col-12">
								<input type="email" id="bottom-email" name="email" placeholder="Email" class="form-control mt-8-mobile" required>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-12 col-12 mt-8-mobile" style="display: flex;">
								<input type="submit" id="bottom-submit" value="Join" class="btn btn-primary center-button mt-8-mobile" style="width: 100%; margin-top: auto; margin-bottom: auto;" required>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<p class="green text-center mb-0 mt-2" style="display: none;" id="feedback-bottom"></p>
							</div>
						</div>
					</form>
				</div>	
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-xs-12">
				<hr />
				<?php $author = App\User::find($post->author_id); ?>
				<p><small>Written by {{ $author->first_name }} on {{ $post->created_at->format('M d Y') }}</small></p>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$("#top-newsletter-form").on('submit', function(e) {
			e.preventDefault();

			$("#top-submit").attr('disabled', true);

			$.ajax({
				url: '/newsletter/submit',
				method: 'POST',
				data: {
					_token: '{{ csrf_token() }}',
					first_name: $("#top-first_name").val(),
					last_name: $("#top-last_name").val(),
					email: $("#top-email").val(),
					source: $("#top-source").val(),
					list_name: $("#top-list_name").val()
				},
				success: function() {
					$("#top-first_name").val('');
					$("#top-last_name").val('');
					$("#top-email").val('');
					$("#feedback-top").show();
					$("#feedback-top").html('You have been successfully subscribed.');
					$("#top-submit").attr('disabled', false);
				}
			});
		});

		$("#bottom-newsletter-form").on('submit', function(e) {
			e.preventDefault();

			$("#bottom-submit").attr('disabled', true);

			$.ajax({
				url: '/newsletter/submit',
				method: 'POST',
				data: {
					_token: '{{ csrf_token() }}',
					first_name: $("#bottom-first_name").val(),
					last_name: $("#bottom-last_name").val(),
					email: $("#bottom-email").val(),
					source: $("#bottom-source").val(),
					list_name: $("#bottom-list_name").val()
				},
				success: function() {
					$("#bottom-first_name").val('');
					$("#bottom-last_name").val('');
					$("#bottom-email").val('');
					$("#feedback-bottom").show();
					$("#feedback-bottom").html('You have been successfully subscribed.');
					$("#bottom-submit").attr('disabled', false);
				}
			});
		});
	</script>
@endsection