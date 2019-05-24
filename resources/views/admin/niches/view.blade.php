@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if(count($niches) > 0)
				<div class="col-12">
					<div style="overflow: auto;">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Title</th>
									<th>Description</th>
									<th># of Questions</th>
									<th># of Links</th>
									<th>
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach($niches as $niche)
								<tr>
									<td style="vertical-align: middle;">{{ $niche->title }}</td>
									<td style="vertical-align: middle;">{{ $niche->description }}</td>
									<td style="vertical-align: middle;">{{ \App\Custom\NicheHelper::getNumberOfQuestionsForNiche($niche->id) }}</td>
									<td style="vertical-align: middle;">{{ \App\Custom\NicheHelper::getNumberOfLinksForNiche($niche->id) }}</td>
									<td style="vertical-align: middle;">
										<a href="{{ url('/admin/niches/edit/' . $niche->id) }}" class="genric-btn primary rounded small m-2">Edit Niche</a>
										<button id="{{ $niche->id }}" class="genric-btn danger rounded small">Delete Niche</button>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@else
				<div class="col-lg-7 col-md-8 col-sm-10 col-12">
					<div class="gray-box">
						<h3 class="text-center">No Niches Found</h3>
						<p class="text-center">There are currently no niches in the system. Click below to get started on creating the first niche.</p>
						<a href="{{ url('/admin/niches/new') }}" class="genric-btn primary centered rounded">Create New Niche</a>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection