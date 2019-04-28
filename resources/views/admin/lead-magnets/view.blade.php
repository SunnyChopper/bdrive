@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	@include('admin.lead-magnets.modals.delete')

	<div class="container mt-64 mb-64">
		<div class="row">
			@if(count($lead_magnets) > 0)
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div style="overflow: auto;">
					<table class="table table-striped">
						<thead>
							<tr style="text-align: center;">
								<th>Title</th>
								<th>Subtitle</th>
								<th>Slug</th>
								<th>Newsletter ID</th>
								<th>Created</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($lead_magnets as $lead_magnet)
								<tr style="text-align: center;">
									<td style="vertical-align: middle;">{{ $lead_magnet->title }}</td>
									<td style="vertical-align: middle;">{{ $lead_magnet->subtitle }}</td>
									<td style="vertical-align: middle;">{{ $lead_magnet->slug }}</td>
									<td style="vertical-align: middle;">{{ $lead_magnet->newsletter_id }}</td>
									<td style="vertical-align: middle;">{{ $lead_magnet->created_at->format('M jS, Y') }}</td>
									<td style="vertical-align: middle;">
										<a href="/admin/lead-magnets/edit/{{ $lead_magnet->id }}" class="btn btn-info rounded small">Edit</a>
										<button id="{{ $lead_magnet->id}}" class="btn delete_lead_magnet_button btn-danger rounded small">Delete</button>
									</td>
								</tr>
							@endforeach	
						</tbody>
					</table>
				</div>
			</div>
			@else
				<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
					<div class="gray-box">
						<h3 class="text-center">No Lead Magnet</h3>
						<p class="text-center">Click on the button below to get started on your first lead magnet.</p>
						<div class="row">
							<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
								<a href="/admin/lead-magnets/new" class="btn btn-primary center-button">New Lead Magnet</a>
							</div>
						</div>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(".delete_lead_magnet_button").on('click', function() {
			// Get post ID
			var lead_id = $(this).attr('id');

			// Set in modal
			$("#delete_lead_magnet_id").val(lead_id);

			// Show modal
			$("#delete_lead_magnet_modal").modal();
		});
	</script>
@endsection