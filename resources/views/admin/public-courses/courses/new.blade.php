@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-8 col-sm-10 col-12">
				<form id="create_course_form" action="/admin/public-courses/create" method="POST">
					{{ csrf_field() }}
					<div class="gray-box">
						<h3 class="text-center">Create New Public Course</h3>
						<p class="text-center">Fields with <span class="red">*</span> are required.</p>
						<div class="form-group">
							<label>Title<span class="red">*</span>:</label>
							<input type="text" class="form-control" name="title" required>
						</div>

						<div class="form-group">
							<label>Description<span class="red">*</span>:</label>
							<textarea class="form-control" name="description" form="create_course_form" rows="5" required></textarea>
						</div>

						<div class="form-group">
							<label>Course Image URL:</label>
							<input type="text" class="form-control" name="image_url">
						</div>

						<div class="form-group">
							<label>Course Video URL:</label>
							<input type="text" class="form-control" name="video_url">
						</div>

						<div class="form-group">
							<input type="submit" class="btn btn-primary centered" value="Create Public Course">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection