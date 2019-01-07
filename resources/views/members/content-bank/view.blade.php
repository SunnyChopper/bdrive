@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64 mt-32-mobile mt-32-desktop">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h2 class="text-center">Get content. Share content.</h2>
				<p class="text-center mb-2">Keep your feed fresh with content from others. Share your content to get brand awareness.</p>
				<div class="center-button">
					<a href="/members/content-bank/new" class="btn btn-primary mb-32" style="display: inline-block;">Upload Content</a>
					<a href="/members/content-bank/my" class="btn btn-warning mb-32" style="display: inline-block;">My Content</a>
				</div>
				<hr />
			</div>
		</div>

		<div class="row">
			@if(count($posts) > 0)
				@foreach($posts as $post)
				<div class="col-lg-4 col-md-4 col-sm-6 col-6">
					<a href="/members/content-bank/view/{{ $post->id }}">
						<div class="content-bank-background-card set-bg light-shadow" data-setbg="{{ $post->image_url }}">
							<div class="content-bank-card-overlay">
								<div class="card-footer">
									<p class="mb-0"><small>{{ $post->category }}</small></p>
								</div>
							</div>
						</div>
					</a>
				</div>
				@endforeach
			@else
				<div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-12">
					<div class="gray-box">
						<p class="text-center">You're early to the party. No content has been uploaded yet. Be the first one.</p>
						<a href="/members/content-bank/new" class="center-button btn btn-primary">Upload Content</a>
					</div>
				</div>
			@endif
		</div>

		<div class="row">
			<div class="col-12">
				{{ $posts->links() }}
			</div>
		</div>
	</div>
@endsection