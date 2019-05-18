@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	@include('admin.public-courses.course-videos.modals.delete')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if(count($videos) > 0)
				<div class="col-12">
					<div style="overflow: auto;">
						<table class="table table-striped">
							<tr>
								<th>Title</th>
								<th>Description</th>
								<th>Question</th>
								<th></th>
							</tr>

							@foreach($videos as $video)
								<tr>
									<td>{{ $video->title }}</td>
									<td>{{ $video->description }}</td>
									<td>{{ $video->question }}</td>
									<td>
										<a href="/admin/public-courses/{{ $course->id }}/videos/edit/{{ $video->id }}" class="btn btn-warning">Edit</a>
										<button id="{{ $course->id }}" class="btn btn-danger delete_public_course_video_button">Delete</button>
									</td>
								</tr>
							@endforeach
						</table>
					</div>

					<a href="/admin/public-courses/{{ $course->id }}/videos/new" class="btn btn-primary centered">Create New Content</a>
				</div>
			@else
				<div class="col-lg-7 col-md-8 col-sm-10 col-12">
					<div class="gray-box">
						<h3 class="text-center">No content available.</h3>
						<p class="text-center">There are no videos added to this public course. Click below to add the first video.</p>
						<a href="/admin/public-courses/{{ $course->id }}/videos/new" class="btn btn-primary centered">Add Content</a>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(".delete_public_course_video_button").on('click', function() {
			var video_id = $(this).attr('id');
			$("#delete_public_course_video_id").val(video_id);

			// Show modal
			$("#delete_public_course_video_modal").modal();
		});
	</script>
@endsection