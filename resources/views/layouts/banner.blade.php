<div class="page-header" style="background-image: url({{ URL::asset('images/slider-1.jpg') }});">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12">
				@if(isset($page_header))
				<h1 class="banner-heading text-center mb-3" data-aos="fade-up">{{ $page_header }}</h1>
				@else
				<h1 class="banner-heading text-center mb-3" data-aos="fade-up">BillionairesDrive</h1>
				@endif
			</div>
		</div>
	</div>
</div>