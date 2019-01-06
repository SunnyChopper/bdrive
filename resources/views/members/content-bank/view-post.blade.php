@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64 mt-32-mobile mb-32-mobile">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
				<img src="https://i.pinimg.com/originals/41/26/8a/41268a8d4aff4b0d70fd9e42952f791f.jpg" class="regular-image light-shadow">
			</div>

			<div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
				<h4 class="mb-0 mt-32-mobile">Motivation</h4>
				<p><small>Uploaded 12 minutes ago</small></p>
				<hr />
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<p><small>SunnyChopper</small></p>
				<hr />
				<h6 class="mb-16">Downloads: <span class="green">546</span></h6>
				<a href="/members/content-bank/download/1" class="btn btn-success light-shadow" style="padding: 12px 36px;">Download <i class="fas fa-download" style="margin-left: 0.5em;"></i></a>
			</div>
		</div>
	</div>
@endsection