@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="gray-box">
					<form id="create_forum_form" action="/members/public-courses/forums/create" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="course_id" value="{{ $course->id }}">
						<div class="form-group">
							<label>Title:</label>
							<input type="text" name="title" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Description:</label>
							<textarea class="form-control" name="description" rows="6" form="create_forum_form" required></textarea>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Create Forum">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection