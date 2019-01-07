@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64 mt-32-mobile mt-32-desktop">
		<form action="/members/content-bank/create" method="post" id="create_content_form" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12 col-12">
					<img src="https://dairydoo.com/wp-content/uploads/2018/03/Placeholder.png" class="regular-image" id="upload_image">
					<input type="file" name="upload_image" class="upload_file" id="upload_file">
					<label for="upload_file" class="center-button"><i class="fas fa-upload" style="margin-right: 0.5em;"></i> Upload Image</label>
				</div>

				<div class="col-lg-8 col-md-6 col-sm-12 col-12 mt-32-mobile">
					<div class="form-group">
						<h6>Caption:</h6>
						<textarea class="form-control" rows="6" name="description" form="create_content_form" required></textarea>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-8 col-12 form-group">
							<h6>Category:</h6>
							<select name="category" form="create_content_form" class="form-control">
								<option value="Beauty">Beauty</option>
								<option value="Business">Business</option>
								<option value="Cars">Cars</option>
								<option value="Education">Education</option>
								<option value="Engineering">Engineering</option>
								<option value="Fashion">Fashion</option>
								<option value="Fitness">Fitness</option>
								<option value="Food">Food</option>
								<option value="Funny">Funny</option>
								<option value="Health">Health</option>
								<option value="Homes">Homes</option>
								<option value="Makeup">Makeup</option>
								<option value="Motivation">Motivation</option>
								<option value="Music">Music</option>
								<option value="Quotes">Quotes</option>
								<option value="Trading">Trading</option>
								<option value="Travel">Travel</option>
								<option value="Trucks">Trucks</option>
								<option value="Wealth">Wealth</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<input type="submit" value="Share Content" class="btn btn-success">
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$("#upload_image").attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("input[name=upload_image]").on('change', function() {
			readURL(this);
		});
	</script>
@endsection