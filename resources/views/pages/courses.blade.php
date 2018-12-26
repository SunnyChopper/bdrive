@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64 mt-32-mobile mb-32-mobile">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6 col-12">
				<a href="/free-course">
					<div class="image-box-edge" >
						<div class="image-box-image set-bg" data-setbg="https://drflkq9jqzld5.cloudfront.net/sites/default/files/main/articles/2018/07/07/instagram-phone-icon.jpg"></div>
						<div class="image-box-info">
							<h5>Instagram Mastery Intro</h5>
							<h6>Price: <span class="green">Free</span></h6>
							<hr />
							<p class="mb-0">Learn the basics of getting started with an Instagram business and learn how all of the puzzle pieces fit together.</p>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
@endsection
