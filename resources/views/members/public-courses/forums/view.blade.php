@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<p>{{ $forum->description }}</p>
				<hr />
				<p><a href="/members/public-courses/view/{{ $course->id }}">Back to Dashboard</a></p>
				<div class="gray-box">
					<form id="create_forum_comment_form" action="/members/public-courses/forums/comment/create" method="POST">
						{{ csrf_field() }}
						<input type="hidden" value="{{ $forum->id }}" name="forum_id">

						<div class="form-group">
							<label>Comment:</label>
							<textarea form="create_forum_comment_form" name="comment" class="form-control" rows="5"></textarea>
						</div>

						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Submit">
						</div>
					</form>

					<hr />


					@if(count($comments) > 0)
						@foreach($comments as $comment)
							<?php $user = \App\Custom\UsersHelper::getUser($comment->user_id); ?>
							<p class="mb-0">{{ $comment->comment }}</p>
							<p><small><a href="/profile/{{ $comment->user_id }}">{{ $user->username }}</a> posted on {{ $comment->created_at->format('M jS, Y') }}</small></p>
							<hr />
						@endforeach
					@else
						<p>No comments yet.</p>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection