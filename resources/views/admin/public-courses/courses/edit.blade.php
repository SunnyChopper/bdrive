@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-8 col-sm-10 col-12">
				<form id="edit_course_form" action="/admin/public-courses/update" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="public_course_id" value="{{ $course->id }}">
					<div class="gray-box">
						<h3 class="text-center">Edit Public Course</h3>
						<p class="text-center">Fields with <span class="red">*</span> are required.</p>
						<div class="form-group">
							<label>Title<span class="red">*</span>:</label>
							<input type="text" class="form-control" name="title" value="{{ $course->title }}" required>
						</div>

						<div class="form-group">
							<label>Description<span class="red">*</span>:</label>
							<textarea class="form-control" name="description" form="edit_course_form" rows="5" required>{{ $course->description }}</textarea>
						</div>

						<div class="form-group">
							<label>Course Image URL:</label>
							<input type="text" class="form-control" value="{{ $course->image_url }}" name="image_url">
						</div>

						<div class="form-group">
							<label>Course Video URL:</label>
							<input type="text" class="form-control" value="{{ $course->video_url }}" name="video_url">
						</div>

						<div class="form-group">
							<input type="submit" class="btn btn-primary centered">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection