<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ $page_title }}</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ URL::asset('css/layouts.css') }}">
	</head>
	<body style="display: flex;">
		<div class="container" style="margin: auto;">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-8 col-sm-10 col-12">
					<img src="https://scontent-sjc3-1.cdninstagram.com/vp/e163423af9cbd5f764fe00be6b241191/5D6BFA15/t51.2885-19/47583872_1944880558895249_764730957256196096_n.jpg?_nc_ht=scontent-sjc3-1.cdninstagram.com&dl=1" class="regular-image-20 centered">
					<h3 class="text-center">{{ $lead_magnet->title }}</h3>

					@if($lead_magnet->image_url != "" || $lead_magnet->youtube_video_url != "")
						@if($lead_magnet->youtube_video_url != "")
						<div class="videoWrapper mb-16 mt-16">
						    <!-- Copy & Pasted from YouTube -->
						    <iframe width="560" height="349" src="https://www.youtube.com/embed/{{ $lead_magnet->youtube_video_url }}?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
						</div>
						@else
						<img src="{{ $lead_magnet->image_url }}" class="regular-image">
						@endif
					@endif

					<p class="text-center">{{ $lead_magnet->description }}</p>
					<form action="/lp/submit">
						{{ csrf_field() }}
						<div class="form-group row justify-content-center">
							<div class="col-lg-8 col-md-8 col-sm-10 col-12">
								<label>Name:</label>
								<input type="text" class="form-control" name="name" required>
							</div>
						</div>

						<div class="form-group row justify-content-center">
							<div class="col-lg-8 col-md-8 col-sm-10 col-12">
								<label>Email:</label>
								<input type="email" class="form-control" name="email" required>
							</div>
						</div>

						<div id="feedback" style="display: none;">
							<p id="feedback_line" class="text-center red"></p>
						</div>

						<div class="form-group row justify-content-center">
							<div class="col-lg-8 col-md-8 col-sm-10 col-12">
								<input type="submit" class="btn btn-primary centered" value="Submit">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>