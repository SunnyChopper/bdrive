@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64 mt-32-mobile mt-32-desktop">
		<form>
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12 col-12">
					<img src="https://dairydoo.com/wp-content/uploads/2018/03/Placeholder.png" class="regular-image" id="upload_image">
					<input type="file" name="upload_image" class="upload_file" id="upload_file">
					<label for="upload_file" class="center-button"><i class="fas fa-upload" style="margin-right: 0.5em;"></i> Upload Image</label>
				</div>

				<div class="col-lg-8 col-md-6 col-sm-12 col-12 mt-32-mobile">
					<div class="form-group">
						<h6>Description:</h6>
						<textarea class="form-control" rows="6" name="description" required></textarea>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-8 col-12 form-group">
							<h6>Category:</h6>
							<select class="form-control">
								<option value="Automotive">Automotive</option>
								<option value="Education">Education</option>
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