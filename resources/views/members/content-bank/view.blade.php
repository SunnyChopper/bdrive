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
			<div class="col-lg-4 col-md-4 col-sm-6 col-6">
				<a href="/members/content-bank/view/1">
					<div class="content-bank-background-card set-bg light-shadow" data-setbg="https://i.pinimg.com/originals/41/26/8a/41268a8d4aff4b0d70fd9e42952f791f.jpg">
						<div class="content-bank-card-overlay">
							<div class="card-footer">
								<p class="mb-0"><small>Cars</small></p>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-6">
				<a href="">
					<div class="content-bank-background-card set-bg light-shadow" data-setbg="https://ayoqq.org/images/abstract-drawing-triangle-5.jpg">
						<div class="content-bank-card-overlay">
							<div class="card-footer">
								<p class="mb-0"><small>Art</small></p>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-6">
				<a href="">
					<div class="content-bank-background-card set-bg light-shadow" data-setbg="https://cdn.gamerant.com/wp-content/uploads/the-division-beta-success.jpg.optimal.jpg">
						<div class="content-bank-card-overlay">
							<div class="card-footer">
								<p class="mb-0"><small>Gaming</small></p>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-6">
				<a href="">
					<div class="content-bank-background-card set-bg light-shadow" data-setbg="https://imagesvc.timeincapp.com/v3/fan/image?url=https://lobandsmash.com/wp-content/uploads/getty-images/2017/07/1052115280.jpeg">
						<div class="content-bank-card-overlay">
							<div class="card-footer">
								<p class="mb-0"><small>Sports</small></p>
							</div>
						</div>
					</div>
				</a>
			</div>


			<div class="col-lg-4 col-md-4 col-sm-6 col-6">
				<a href="">
					<div class="content-bank-background-card set-bg light-shadow" data-setbg="https://i.pinimg.com/originals/72/92/4f/72924fb1e6a29d199ffb71312bf3133f.jpg">
						<div class="content-bank-card-overlay">
							<div class="card-footer">
								<p class="mb-0"><small>Motivation</small></p>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-6">
				<a href="">
					<div class="content-bank-background-card set-bg light-shadow" data-setbg="https://classpass.com/blog/wp-content/uploads/2016/06/summer-food-trends.jpg">
						<div class="content-bank-card-overlay">
							<div class="card-footer">
								<p class="mb-0"><small>Food</small></p>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
@endsection