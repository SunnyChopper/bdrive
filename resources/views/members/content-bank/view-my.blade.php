@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	@include('members.content-bank.modals.delete')

	<div class="container mt-64 mb-64 mt-32-mobile mt-32-desktop">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h2 class="text-center">Your content.</h2>
				<p class="text-center mb-2">Edit your content and view performance.</p>
				<hr />
			</div>
		</div>

		<div class="row">
			@if(count($posts) > 0)
				@foreach($posts as $post)
					<div class="col-lg-4 col-md-4 col-sm-6 col-12">
						
						<div class="content-bank-background-card set-bg light-shadow" data-setbg="{{ $post->image_url }}">
							<div class="content-bank-card-overlay">
								<div class="card-footer" style="width: 100%">
									<p class="mb-0" style="display: inline-block; float: left; margin-top: 0.5em;"><small>{{ $post->downloads }} Downloads</small></p>
									<a href="/members/content-bank/edit/{{ $post->id }}" class="mb-0 btn btn-primary" style="display: inline-block; float: right; background-color: #0389FF;">Edit</a>
									<p class="mb-0 btn btn-danger delete_content_button" id="{{ $post->id }}" style="display: inline-block; float: right; margin-right: 0.5em;"><small>Delete</small></p>
								</div>
							</div>
						</div>
						
					</div>
				@endforeach
			@else
				<div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-12">
					<div class="gray-box">
						<p class="text-center">You have not uploaded any content yet.</p>
						<a href="/members/content-bank/new" class="center-button btn btn-primary">Upload Content</a>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(".delete_content_button").on('click', function(){
			// Get ID
			var post_id = this.id;
			console.log(post_id);

			// Set ID
			$("#delete_post_id").val(post_id);

			// Show modal
			$("#delete_content_bank_modal").modal();
		});
	</script>
@endsection