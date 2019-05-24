@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-9 col-md-10 col-sm-12 col-12">
				<div class="gray-box">
					<form id="create_niche_form" action="/admin/niches/create" method="POST">
						{{ csrf_field() }}

						<div class="form-group">
							<label>Title:</label>
							<input type="text" class="form-control" name="title" required>
						</div>

						<div class="form-group">
							<label>Description:</label>
							<textarea class="form-control" rows="5" form="create_niche_form" name="description"></textarea>
						</div>

						<div class="form-group">
							<input type="submit" class="genric-btn primary rounded" value="Create Niche">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection