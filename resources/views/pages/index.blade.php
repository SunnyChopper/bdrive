@extends('layouts.app')

@section('content')
	@include('layouts.main-banner')

	<div class="templateux-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 templateux-overlap">
					<div class="row">
						<div class="col-md-4" data-aos="fade-up" data-aos-delay="600">
							<div class="media block-icon-1 d-block text-left">
								<div class="icon mb-3"><span class="ion-ios-camera-outline"></span></div>
								<div class="media-body">
									<h3 class="h5 mb-4">Access to Content</h3>
									<p>By joining the community, you're also getting access to content that you can use on your own page.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4" data-aos="fade-up" data-aos-delay="700">
							<div class="media block-icon-1 d-block text-left">
								<div class="icon mb-3"><span class="ion-ios-book-outline"></span></div>
								<div class="media-body">
									<h3 class="h5 mb-4">Updated Content</h3>
									<p>Instagram is constantly changing, so do the lessons and content. Pay once and continuously get new content.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4" data-aos="fade-up" data-aos-delay="800">
							<div class="media block-icon-1 d-block text-left">
								<div class="icon mb-3"><span class="ion-ios-infinite-outline"></span></div>
								<div class="media-body">
									<h3 class="h5 mb-4">Infinite Posibilities</h3>
									<p>With new niches being created daily on Instagram, the business opportunities are endless.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="templateux-section bg-light">
		<div class="container">
			<div class="row mb-5">
				<div class="col-12">
					<h2 class="text-center">What You Will Get</h2>
				</div>
			</div>

			<div class="row mb-5">
				<div class="col-md-4 mb-4" data-aos="fade-up">
					<div class="media block-icon-1 d-block text-center">
						<div class="icon mb-3"><span class="ion-ios-loop"></span></div>
						<div class="media-body">
							<h3 class="h5 mb-4">Regular Updates</h3>
							<p>Tactics and strategies can become outdated. That's why we continually update our systems with the newest information available.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
					<div class="media block-icon-1 d-block text-center">
						<div class="icon mb-3"><span class="ion-ios-cloud-outline"></span></div>
						<div class="media-body">
							<h3 class="h5 mb-4">Cloud-Based</h3>
							<p>Use the site from your desktop and easily transition to your phone. Our courses and tools are hosted in the cloud.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
					<div class="media block-icon-1 d-block text-center">
						<div class="icon mb-3"><span class="ion-ios-locked-outline"></span></div>
						<div class="media-body">
							<h3 class="h5 mb-4">SSL Secured Site</h3>
							<p>All of our software tools use a 128-bit secure socket layer (SSL) to encrypt your data. Don't worry, no one will steal your idea.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
					<div class="media block-icon-1 d-block text-center">
						<div class="icon mb-3"><span class="ion-ios-chatboxes-outline"></span></div>
						<div class="media-body">
							<h3 class="h5 mb-4">Access to Mentors</h3>
							<p>Ask your questions. One of the fastest ways to grow is to have a mentor who will clear up any confusion that you may have.</p>
						</div>
					</div> 
				</div>
				<div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="400">
					<div class="media block-icon-1 d-block text-center">
						<div class="icon mb-3"><span class="ion-ios-lightbulb-outline"></span></div>
						<div class="media-body">
							<h3 class="h5 mb-4">Niche Explorer Tool</h3>
							<p>Need ideas for which niche you should begin with? Our Niche Explorer Tool can help you find an Instagram niche you can monetize.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="500">
					<div class="media block-icon-1 d-block text-center">
						<div class="icon mb-3"><span class="ion-ios-videocam-outline"></span></div>
						<div class="media-body">
							<h3 class="h5 mb-4">Video Lessons</h3>
							<p>One of the best ways to learn is to watch how things are done. Video is with no doubt highly engaging which is why we teach through video.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="templateux-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 testimonial-wrap">
					<div class="quote">&ldquo;</div>
					<div class="owl-carousel wide-slider-testimonial">
						<div class="item">
							<blockquote class="block-testomonial">
								<p>&ldquo;Starting and growing a business is as much about the innovation, drive and determination of the people who do it as it is about the product they sell.&rdquo;</p>
								<p>- Elon Musk</p>
							</blockquote>
						</div>

						<div class="item">
							<blockquote class="block-testomonial">
								<p>&ldquo;If you want something you've never had, you must be willing to do something that you've never done.&rdquo;</p>
								<p>- Thomas Jefferson</p>
							</blockquote>
						</div>

						<div class="item">
							<blockquote class="block-testomonial">
								<p>&ldquo;Don't find customers for your products, find products for your customers.&rdquo;</p>
								<p>- Seth Godin</p>
							</blockquote>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('layouts.bottom-cta')
@endsection