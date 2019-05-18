@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if(count($forums) > 0)
			<div class="col-12">
				<div style="overflow: auto;">
					<table class="table table-striped">
						@foreach($forums as $forum)
						<tr>
							<td>{{ $forum->title }}</td>
							<td>{{ substr($forum->description, 0, 128) }}...</td>
							<td>{{ $forum->created_at->format('M jS, Y') }}</td>
							<td><a href="/members/public-courses/{{ $course->id }}/forums/{{ $forum->id }}">View</a></td>
						</tr>
						@endforeach
					</table>
				</div>

				{{ $forums->links() }}
				<a href="/members/public-courses/{{ $course->id }}/new/forums" class="btn btn-primary">New Course Forum</a>
			</div>
			@else
			<div class="col-lg-7 col-md-8 col-sm-10 col-12">
				<div class="gray-box">
					<h5 class="text-center">No forums for course.</h5>
					<p class="text-center">There are no forums for this course. Click below to get started on the first one.</p>
					<a href="/members/public-courses/{{ $course->id }}/new/forums" class="btn btn-primary centered">New Course Forum</a>
				</div>
			</div>
			@endif
		</div>
	</div>
@endsection