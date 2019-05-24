@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if(count($questions) > 0)
				<div class="col-12">
					<div style="overflow: auto;">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Niche</th>
									<th>Question</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($questions as $question)
								<tr>
									<td style="vertical-align: middle;">{{ \App\Custom\NicheHelper::getNicheTitle($question->niche_id) }}</td>
									<td style="vertical-align: middle;">{{ $question->question }}</td>
									<td style="vertical-align: middle;">
										<a href="{{ url('/admin/niches/' . $niche->id . '/questions/edit/' . $question->id) }}" class="genric-btn primary rounded small">Edit Question</a>
										<button id="{{ $question->id }}" class="genric-btn danger rounded small">Delete Question</button>
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
						<h3 class="text-center">No Questions for Niche</h3>
						<p class="text-center">There are currently no questions for this niche. Click below to get started on creating the first one.</p>
						<a href="{{ url('/admin/niches/' . $niche->id . '/questions/new') }}" class="genric-btn primary rounded centered">Create New Question</a>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection