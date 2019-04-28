@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-xs-12">
				<div class="gray-box">
					<h3 class="text-center">Create a New Lead Magnet</h3>
					<p class="text-center">Fields with <span class="red">*</span> are required.</p>
					<hr />
					<form action="/admin/lead-magnets/create" method="post" id="new_lead_magnet_form">
						{{ csrf_field() }}
						<div class="form-group mb-64">
							<h5>Title<span class="red">*</span>:</h5>
							<p class="mb-2">This will be the title of the lead magnet that will show up on the landing page.</p>
							<input type="text" name="title" class="form-control" required>
						</div>

						<div class="form-group mb-64">
							<h5>Subtitle<span class="red">*</span>:</h5>
							<p class="mb-2">This will be the subtitle of the lead magnet that will show up on the landing page.</p>
							<input type="text" name="subtitle" class="form-control" required>
						</div>

						<div class="form-group mb-64">
							<h5>Description<span class="red">*</span>:</h5>
							<p class="mb-2">This is the description of the lead magnet. This will be used for SEO and be displayed on the landing page.</p>
							<textarea name="description" class="form-control" rows="15" form="new_lead_magnet_form"></textarea>
						</div>

						<div class="form-group mb-64">
							<h5>Image URL:</h5>
							<p class="mb-2">Enter the URL for the image that goes with this lead magnet. It will be used on Open Graph as well.</p>
							<input type="text" name="image_url" class="form-control">
						</div>

						<div class="form-group mb-64">
							<h5>YouTube Video URL:</h5>
							<p class="mb-2">If there's a video that goes with this lead magnet, put the URL of the YouTube video here.</p>
							<input type="text" name="youtube_video_url" class="form-control">
						</div>

						<div class="form-group mb-64">
							<h5>MailChimp Newsletter ID<span class="red">*</span>:</h5>
							<p class="mb-2">The ID for the Mailchimp newsletter. Configured in config/newsletter.php.</p>
							<input type="text" name="newsletter_id" class="form-control" required>
						</div>

						<div class="form-group mb-64">
							<h5>Slug<span class="red">*</span>:</h5>
							<p class="mb-2">This is the part that will go into the URL, so make it SEO friendly.</p>
							<input type="text" name="slug" class="form-control" required>
						</div>

						<div class="form-group">
							<input type="submit" value="Create Lead Magnet" class="btn btn-success">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection