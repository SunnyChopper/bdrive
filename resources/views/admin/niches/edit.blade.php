@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-9 col-md-10 col-sm-12 col-12">
				<div class="gray-box">
					<form id="update_niche_form" action="/admin/niches/update" method="POST">
						{{ csrf_field() }}
						<input type="hidden" value="{{ $niche->id }}" name="niche_id">

						<div class="form-group">
							<label>Title:</label>
							<input type="text" class="form-control" name="title" value="{{ $niche->title }}" required>
						</div>

						<div class="form-group">
							<label>Description:</label>
							<textarea class="form-control" rows="5" form="update_niche_form" name="description">{{ $niche->description }}</textarea>
						</div>

						<div class="form-group">
							<input type="submit" class="genric-btn primary rounded" value="Update Niche">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection