@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	@include('admin.public-courses.courses.modals.delete')
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if(count($courses) > 0)
				<div class="col-12">
					<div style="overflow: auto;">
						<table class="table table-striped">
							<tr>
								<th>Title</th>
								<th>Description</th>
								<th>Image</th>
								<th>Video</th>
								<th></th>
							</tr>

							@foreach($courses as $course)
							<tr>
								<td>{{ $course->title }}</td>
								<td>{{ $course->description }}</td>

								@if($course->image_url != "")
								<td><img src="{{ $course->image_url }}" class="regular-image" /></td>
								@else
								<td>No image available</td>
								@endif

								@if($course->video_url != "")
								<td>
									<div class="videoWrapper">
										<iframe width="560" height="349" src="http://www.youtube.com/embed/{{ $course->video_url }}?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
									</div>
								</td>
								@else
								<td>No video available</td>
								@endif

								<td>
									<a href="/admin/public-courses/{{ $course->id }}/videos/view" class="btn btn-primary">View Content</a>
									<a href="/admin/public-courses/edit/{{ $course->id }}" class="btn btn-warning">Edit</a>
									<button id="{{ $course->id }}" class="btn btn-danger delete_public_course_button">Delete</button>
								</td>
							</tr>
							@endforeach
						</table>
					</div>

					<a href="/admin/public-courses/new" class="btn btn-primary centered mt-16">Create New Public Course</a>
				</div>
			@else
				<div class="col-lg-7 col-md-8 col-sm-10 col-12">
					<div class="gray-box">
						<h3 class="text-center">No public courses available.</h3>
						<p class="text-center">Click below to get started on creating the first public course.</p>
						<a href="/admin/public-courses/new" class="btn btn-primary centered">Create Public Course</a>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(".delete_public_course_button").on('click', function() {
			var course_id = $(this).attr('id');
			$("#delete_public_course_id").val(course_id);

			// Show modal
			$("#delete_public_course_modal").modal();
		});
	</script>
@endsection