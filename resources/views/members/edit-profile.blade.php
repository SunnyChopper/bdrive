@extends("layouts.app")

@section('content')
	@include("layouts.banner")

	<div class="container mt-64 mb-64 mt-32-mobile mb-32-mobile">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-10 col-sm-12 col-12">
				<div class="gray-box">
					<form action="/members/profile/update" method="POST" id="edit_profile_form" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="hidden" value="{{ $user->id }}" name="user_id">

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h5>Basic Information</h5>
								<hr />
							</div>
						</div>

						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<img src="{{ $user->profile_image_url }}" class="regular-image" id="profile_image">
								<input type="file" name="profile_image" accept=".png,.jpg,.jpeg">
							</div>

							<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label>First Name:</label>
										<input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control" required> 
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label>Last Name:</label>
										<input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control" required> 
									</div>
								</div>

								<div class="row mt-16">
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label>Username:</label>
										<input type="text" name="username" value="{{ $user->username }}" class="form-control" required>
										<span id="username_available" style="display: none;"><small class="green"><i class="fas fa-check" style="margin-right: 0.5em;"></i> Username available.</small></span>
										<span id="username_unavailable" style="display: none;"><small class="red"><i class="far fa-times-circle" style="margin-right: 0.5em;"></i> Username unavailable.</small></span>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label>Email:</label>
										<input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
										<span id="email_available" style="display: none;"><small class="green"><i class="fas fa-check" style="margin-right: 0.5em;"></i> Email available.</small></span>
										<span id="email_unavailable" style="display: none;"><small class="red"><i class="far fa-times-circle" style="margin-right: 0.5em;"></i> Email unavailable.</small></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-32">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h5>Social Links</h5>
								<hr />
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-8">
								<label>Facebook:</label>
								<input type="url" name="facebook_link" value="{{ $user->facebook_link }}" class="form-control">
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-8">
								<label>Twitter:</label>
								<input type="url" name="twitter_link" value="{{ $user->twitter_link }}" class="form-control">
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-8">
								<label>Instagram:</label>
								<input type="url" name="instagram_link" value="{{ $user->instagram_link }}" class="form-control">
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-8">
								<label>YouTube:</label>
								<input type="url" name="youtube_link" value="{{ $user->youtube_link }}" class="form-control">
							</div>
						</div>

						<div class="row mt-32">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<input type="submit" value="Update Profile" id="submit_button" class="btn btn-primary">
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
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$("#profile_image").attr('src', e.target.result);
					$("#profile_image").css('margin-bottom', '16px');
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("input[name=username]").on('change', function(e) {
			var username = $(this).val();
			$("input[type=submit]").attr('disabled', true);
			$.ajax({
				url: '/api/username/check',
				data: {
					_token: "{{ csrf_token() }}",
					username: username
				},
				method: 'POST',
				success: function(data) {
					if (data["check"] == "available") {
						$("input[name=username]").css('border', '1px solid green');
						$("#username_available").show();
						$("#username_unavailable").hide();

						if ($("#username_unavailable").is(":hidden") && $("#email_unavailable").is(":hidden")) {
							$("input[type=submit]").attr('disabled', false);
						}
					} else {
						$("input[type=submit]").attr('disabled', true);
						$("input[name=username]").css('border', '1px solid red');
						$("#username_unavailable").show();
						$("#username_available").hide();
					}
				}
			});
		});

		$("input[name=email]").on('change', function(e) {
			var email = $(this).val();
			$("input[type=submit]").attr('disabled', true);
			$.ajax({
				url: '/api/email/check',
				data: {
					_token: "{{ csrf_token() }}",
					email: email
				},
				method: 'POST',
				success: function(data) {
					if (data["check"] == "available") {
						$("input[name=email]").css('border', '1px solid green');
						$("#email_available").show();
						$("#email_unavailable").hide();

						if ($("#username_unavailable").is(":hidden") && $("#email_unavailable").is(":hidden")) {
							$("input[type=submit]").attr('disabled', false);
						}
					} else {
						$("input[type=submit]").attr('disabled', true);
						$("input[name=email]").css('border', '1px solid red');
						$("#email_unavailable").show();
						$("#email_available").hide();
					}
				}
			});
		});

		$("input[name=profile_image]").on('change', function() {
			readURL(this);
		});
	</script>
@endsection