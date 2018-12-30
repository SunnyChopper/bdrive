@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64">
		@if(Auth::guest())
			<div class="row mb-32">
				<div class="col-lg-8 offset-lg-2 col-lg-offset-2 col-md-10 offset-md-1 col-md-offset-1 col-sm-12 col-xs-12 col-12">
					@if($content->youtube_video_id)
						<div class="videoWrapper">
						    <!-- Copy & Pasted from YouTube -->
						    <iframe width="560" height="349" src="http://www.youtube.com/embed/{{ $content->youtube_video_id }}?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
						</div>
					@endif
				</div>

				<div class="col-lg-8 offset-lg-2 col-lg-offset-2 col-md-10 offset-md-1 col-md-offset-1 col-sm-12 col-xs-12 col-12">
					@if($content->featured_image_url != "")
						<img src="{{ $content->featured_image_url }}" class="regular-image">
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 offset-lg-2 col-lg-offset-2 col-md-10 offset-md-1 col-md-offset-1 col-sm-12 col-xs-12 col-12">
					<div id="post-body">
						{!! $post->body !!}
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-8 offset-lg-2 col-lg-offset-2 col-md-10 offset-md-1 col-md-offset-1 col-sm-12 col-xs-12 col-12">
					<hr />
					<p><small>Written on {{ $post->created_at->format('M d Y') }}</small></p>
				</div>
			</div>
		@else
			<div class="row mb-32">
				<div class="col-lg-8 offset-lg-2 col-lg-offset-2 col-md-10 offset-md-1 col-md-offset-1 col-sm-12 col-xs-12 col-12">
					<div id="post-body">
						{!! substr($post->body, 0, 128) !!}
					</div>
				</div>

				<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-md-offset-1 col-sm-12 col-xs-12 col-12">
					<div class="gray-box">
						<h3 class="text-center">This is Premium Content</h3>
						<p class="text-center">We like to treat our members to exclusive content. Don't worry, you can become a member for free too! Simply click below and join the community and get more premium content, downloadables, and much more.</p>
						<a href="/register" class="btn btn-primary centered center-button">Join the Community</a>
					</div>
				</div>
			</div>
		@endif
	</div>
@endsection