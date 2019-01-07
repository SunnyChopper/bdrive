@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64 mt-32-mobile mt-32-desktop">
		<form action="/members/content-bank/update" method="post" id="edit_content_form">
			{{ csrf_field() }}
			<input type="hidden" value="{{ $post->id }}" name="post_id">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12 col-12">
					<img src="{{ $post->image_url }}" class="regular-image" id="upload_image">
				</div>

				<div class="col-lg-8 col-md-6 col-sm-12 col-12 mt-32-mobile">
					<div class="form-group">
						<h6>Caption:</h6>
						<textarea class="form-control" rows="6" form="edit_content_form" name="description" required>{{ $post->description }}</textarea>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-8 col-12 form-group">
							<h6>Category:</h6>
							<select name="category" form="edit_content_form" class="form-control">
								<option value="Beauty" <?php if ($post->category == "Beauty") { echo "selected"; } ?>>Beauty</option>
								<option value="Business" <?php if ($post->category == "Business") { echo "selected"; } ?>>Business</option>
								<option value="Cars" <?php if ($post->category == "Cars") { echo "selected"; } ?>>Cars</option>
								<option value="Education" <?php if ($post->category == "Education") { echo "selected"; } ?>>Education</option>
								<option value="Engineering" <?php if ($post->category == "Engineering") { echo "selected"; } ?>>Engineering</option>
								<option value="Fashion" <?php if ($post->category == "Fashion") { echo "selected"; } ?>>Fashion</option>
								<option value="Fitness" <?php if ($post->category == "Fitness") { echo "selected"; } ?>>Fitness</option>
								<option value="Food" <?php if ($post->category == "Food") { echo "selected"; } ?>>Food</option>
								<option value="Funny" <?php if ($post->category == "Funny") { echo "selected"; } ?>>Funny</option>
								<option value="Health" <?php if ($post->category == "Health") { echo "selected"; } ?>>Health</option>
								<option value="Homes" <?php if ($post->category == "Homes") { echo "selected"; } ?>>Homes</option>
								<option value="Makeup" <?php if ($post->category == "Makeup") { echo "selected"; } ?>>Makeup</option>
								<option value="Motivation" <?php if ($post->category == "Motivation") { echo "selected"; } ?>>Motivation</option>
								<option value="Music" <?php if ($post->category == "Music") { echo "selected"; } ?>>Music</option>
								<option value="Quotes" <?php if ($post->category == "Quotes") { echo "selected"; } ?>>Quotes</option>
								<option value="Trading" <?php if ($post->category == "Trading") { echo "selected"; } ?>>Trading</option>
								<option value="Travel" <?php if ($post->category == "Travel") { echo "selected"; } ?>>Travel</option>
								<option value="Trucks" <?php if ($post->category == "Trucks") { echo "selected"; } ?>>Trucks</option>
								<option value="Wealth" <?php if ($post->category == "Wealth") { echo "selected"; } ?>>Wealth</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<button class="btn btn-success" form="edit_content_form">Save <i class="fas fa-sync-alt" style="margin-left: 0.5em;"></i></button>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection