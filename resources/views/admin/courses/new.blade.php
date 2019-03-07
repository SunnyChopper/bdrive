@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-xs-12">
				<div class="gray-box">
					<h3 class="text-center">Create a New Course</h3>
					<p class="text-center">Fields with <span class="red">*</span> are required.</p>
					<hr />
					<form action="/admin/courses/create" method="post" id="new_course_form">
						{{ csrf_field() }}
						<div class="form-group mb-64">
							<h5>Title<span class="red">*</span>:</h5>
							<input type="text" name="title" class="form-control" required>
						</div>

						<div class="form-group mb-64">
							<h5>Description<span class="red">*</span>:</h5>
							<textarea name="description" class="form-control" rows="15" form="new_course_form"></textarea>
						</div>

						<div class="form-group mb-64">
							<h5>YouTube Video ID:</h5>
							<input type="text" name="preview_video" class="form-control">
						</div>

						<div class="form-group mb-64">
							<h5>Amount<span class="red">*</span>:</h5>
							<input type="number" name="amount" step="0.01" min="0.00" class="form-control" value="0.00" required>
						</div>

						<div class="form-group">
							<input type="submit" value="Create Course" class="btn btn-success">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection