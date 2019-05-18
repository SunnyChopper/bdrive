@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-8 col-sm-10 col-12">
				<form action="/admin/public-courses/videos/update" method="POST" id="edit_public_course_video_form">
					{{ csrf_field() }}
					<input type="hidden" name="video_id" value="{{ $video->id }}">
					<div class="gray-box">
						<h3 class="text-center">Edit Video Content</h3>
						<p class="text-center">Fields with <span class="red">*</span> are required.</p>
						<div class="form-group">
							<label>Title<span class="red">*</span>:</label>
							<input type="text" class="form-control" value="{{ $video->title }}" name="title" required>
						</div>

						<div class="form-group">
							<label>Description<span class="red">*</span>:</label>
							<textarea class="form-control" form="edit_public_course_video_form" name="description" required>
								{{ $video->description }}
							</textarea>
						</div>

						<div class="form-group">
							<label>YouTube Video ID<span class="red">*</span>:</label>
							<input type="text" class="form-control" value="{{ $video->video_url }}" name="video_url" required>
						</div>

						<div class="form-group">
							<label>Question<span class="red">*</span>:</label>
							<input type="text" class="form-control" value="{{ $video->question }}" name="question" required>
						</div>

						<div class="form-group">
							<label>Subscribe URL:</label>
							<input type="text" class="form-control" value="{{ $video->subscribe_url }}" name="subscribe_url">
						</div>

						<div class="form-group">
							<input type="submit" class="genric_btn primary centered" value="Update Content">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection