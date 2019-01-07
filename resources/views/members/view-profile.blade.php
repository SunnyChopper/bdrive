@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64 mt-32-mobile mb-32-mobile">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-4 col-12">
				<img src="{{ $user->profile_image_url }}" class="regular-image">
				<div class="d-md-block">
					<h3 class="mt-16 mb-0">{{ $user->first_name }} {{ $user->last_name }}</h3>
					<p>Joined on {{ $user->created_at->format('M jS, Y') }}</p>
					@if(Auth::id() == $user->id)
						<p class="mb-0"><small><a href="/members/profile/edit/{{ $user->id }}"><i class="fas fa-pencil-alt" style="margin-right: 0.5em;"></i> Edit Profile</a></small></p>
					@endif

					<hr />

					@if($user->facebook_link != "")
						<p class="mb-0"><small><a href="{{ $user->facebook_link }}"><i class="fab fa-facebook" style="margin-right: 0.5em;"></i> Facebook</a></small></p>
					@endif

					@if($user->twitter_link != "")
						<p class="mb-0"><small><a href="{{ $user->twitter_link }}"><i class="fab fa-twitter" style="margin-right: 0.5em;"></i> Twitter</a></small></p>
					@endif

					@if($user->instagram_link != "")
						<p class="mb-0"><small><a href="{{ $user->instagram_link }}"><i class="fab fa-instagram" style="margin-right: 0.5em;"></i> Instagram</a></small></p>
					@endif

					@if($user->youtube_link != "")
						<p class="mb-0"><small><a href="{{ $user->youtube_link }}"><i class="fab fa-youtube" style="margin-right: 0.5em;"></i> YouTube</a></small></p>
					@endif
				</div>
			</div>

			<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 mt-32-mobile">
				<div class="gray-box">
					@if(count($content) == 0)
						<p class="mb-0 text-center">No activity yet...</p>
					@endif

					@if(count($content) > 0)
						<h4>Content Bank</h4>
						<div class="row">
							@foreach($content as $c)
								<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
									<a href="/members/content-bank/view/{{ $c->id }}">
										<div class="content-bank-background-card set-bg" data-setbg="{{ $c->image_url }}">
											<div class="content-bank-card-overlay">
												<div class="card-footer">
													<h5 class="mb-0">{{ $c->category }}</h5>
													<p class="white mb-0 mt-0"><small>{{ $c->created_at->format('M jS, Y') }}</small></p>
												</div>
											</div>
										</div>
									</a>
								</div>
							@endforeach
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection