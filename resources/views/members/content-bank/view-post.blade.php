@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64 mt-32-mobile mb-32-mobile">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
				<img src="{{ $post->image_url }}" class="regular-image light-shadow">
			</div>

			<div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
				<h4 class="mb-0 mt-32-mobile">{{ $post->category }}</h4>
				{{-- <p><small>Uploaded 12 minutes ago</small></p> --}}
				<hr />
				<p>{{ $post->description }}</p>
				<?php $user = App\User::find($post->post_user_id); ?>
				<a href="/members/profile/{{ $user->id }}"><small>{{ $user->username }}</small></a>
				<hr />
				<h6 class="mb-16">Downloads: <span class="green">{{ $post->downloads }}</span></h6>
				<a href="/members/content-bank/download/{{ $post->id }}" class="btn btn-success light-shadow" target="_blank" style="padding: 12px 36px;">Download <i class="fas fa-download" style="margin-left: 0.5em;"></i></a>
			</div>
		</div>
	</div>
@endsection