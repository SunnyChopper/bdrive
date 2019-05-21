@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h4 class="mb-32"><a href="{{ url('/members/public-courses/' . $video->course_id . '/videos') }}"><i class="fas fa-arrow-left"></i> View all course videos</a></h4>
				<div class="videoWrapper">
					<iframe width="560" height="349" src="https://www.youtube.com/embed/{{ $video->video_url }}?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
				</div>

				<h4 class="mt-32">{{ $video->title }}</h4>
				<p>{{ $video->description }}</p>

				<div class="gray-box">
					<h6><strong>Question:</strong> {{ $video->question }}</h6>
					
					@if(\App\Custom\PublicCourseHelper::hasUserCommentedOnVideo(Auth::id(), $video->id))
					<?php $comment = \App\Custom\PublicCourseHelper::getUserCommentOnVideo(Auth::id(), $video->id); ?>
					<p class="mb-0"><strong>Your response:</strong> {{ $comment->comment }}</p>
					@else
					<p>Answer the question above and receive 5 points.</p>
					<p><strong>Your Points: </strong> {{ \App\Custom\UsersHelper::getPoints(Auth::id()) }}</p>
					<form id="create_comment_form" action="/members/public-courses/comment/create" method="POST">
						<input type="hidden" value="{{ $video->course_id }}" name="public_course_id">
						<input type="hidden" value="{{ $video->id }}" name="public_video_id">
						{{ csrf_field() }}
						<div class="form-group">
							<textarea class="form-control" rows="5" name="comment" form="create_comment_form" required></textarea>
						</div>

						<div class="form-group">
							<input type="submit" value="Submit Answer" class="btn btn-primary">
						</div>
					</form>
					@endif
				</div>

				@if(count($comments) > 0)
				<ul class="list-group mt-32">
					@foreach($comments as $comment)
						<?php $user = \App\Custom\UsersHelper::getUser($comment->user_id); ?>
						<li class="list-group-item">
							<div class="row">
								<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
									<a href="/profile/{{ $user->id }}"><img src="{{ $user->profile_image_url }}" class="regular-image"></a>
									<a href="/profile/{{ $user->id }}"><p class="mb-0 text-center mt-16"><strong>{{ $user->username }}</strong></p></a>
								</div>

								<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 mt-32-mobile">
									<p class="mb-0">{{ $comment->comment }}</p>
									
									<p><small>Posted:  {{ $comment->created_at->format('M jS, Y') }}</small></p>
								</div>
							</div>
						</li>
					@endforeach
				</ul>
				@else
				<p class="text-center mt-32">No one has answered this question. Be the first.</p>
				@endif
			</div>
		</div>
	</div>
@endsection