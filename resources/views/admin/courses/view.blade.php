@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	@include('admin.courses.modals.delete')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if(count($courses) > 0)
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div style="overflow: auto;">
						<table class="table table-striped">
							<thead>
								<tr style="text-align: center;">
									<th>Title</th>
									<th>Description</th>
									<th>Preview Video</th>
									<th>Enrolled</th>
									<th>Price</th>
									<th>Created At</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($courses as $course)
									<tr style="text-align: center;">
										<td style="vertical-align: middle;">{{ $course->title }}</td>
										<td style="vertical-align: middle;">{{ $course->description }}</td>
										@if($course->preview_video != "")
											<td style="vertical-align: middle;">
												<div class="videoWrapper">
												    <iframe width="560" height="349" src="https://www.youtube.com/embed/{{ $course->preview_video }}?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
												</div>
											</td>
										@else
											<td style="vertical-align: middle;">No preview video.</td>
										@endif
										<td style="vertical-align: middle;">{{ $course->enrolled }}</td>
										<td style="vertical-align: middle;">${{ $course->amount }}</td>
										<td style="vertical-align: middle;">{{ $course->created_at->format('M jS, Y') }}</td>
										<td style="vertical-align: middle;">
											<a href="/admin/courses/edit/{{ $course->id }}" class="btn btn-info rounded small">Edit Course</a>
											<a href="/admin/courses/modules/{{ $course->id }}/edit" class="btn btn-warning rounded small">Edit Modules</a>
											<button id="{{ $course->id}}" class="btn delete_course_button btn-danger rounded small">Delete</button>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@else
				<div class="col-lg-8 col-md-8 col-sm-12 col-12">
					<div class="gray-box">
						<h5 class="text-center">No courses on site.</h5>
						<p class="text-center">Click below to start a new course.</p>
						<a href="/admin/courses/new" class="btn btn-primary centered rounded small">New Course</a> 
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(".delete_course_button").on('click', function() {
			// Get post ID
			var lead_id = $(this).attr('id');

			// Set in modal
			$("#delete_course_id").val(lead_id);

			// Show modal
			$("#delete_course_modal").modal();
		});
	</script>
@endsection