@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64 mt-32-mobile mt-32-desktop">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h2 class="text-center">Your content.</h2>
				<p class="text-center mb-2">Edit your content and view performance.</p>
				<hr />
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6 col-12">
				<a href="/members/content-bank/edit/1">
					<div class="content-bank-background-card set-bg light-shadow" data-setbg="https://i.pinimg.com/originals/41/26/8a/41268a8d4aff4b0d70fd9e42952f791f.jpg">
						<div class="content-bank-card-overlay">
							<div class="card-footer" style="width: 100%">
								<p class="mb-0" style="display: inline-block; float: left; margin-top: 0.5em;"><small>457 Downloads</small></p>
								<p class="mb-0 btn btn-primary" style="display: inline-block; float: right;"><small>Edit</small></p>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-6">
				<a href="">
					<div class="content-bank-background-card set-bg light-shadow" data-setbg="https://ayoqq.org/images/abstract-drawing-triangle-5.jpg">
						<div class="content-bank-card-overlay">
							<div class="card-footer" style="width: 100%">
								<p class="mb-0" style="display: inline-block; float: left; margin-top: 0.5em;"><small>94 Downloads</small></p>
								<p class="mb-0 btn btn-primary" style="display: inline-block; float: right;"><small>Edit</small></p>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-6">
				<a href="">
					<div class="content-bank-background-card set-bg light-shadow" data-setbg="https://cdn.gamerant.com/wp-content/uploads/the-division-beta-success.jpg.optimal.jpg">
						<div class="content-bank-card-overlay">
							<div class="card-footer" style="width: 100%">
								<p class="mb-0" style="display: inline-block; float: left; margin-top: 0.5em;"><small>114 Downloads</small></p>
								<p class="mb-0 btn btn-primary" style="display: inline-block; float: right;"><small>Edit</small></p>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
@endsection