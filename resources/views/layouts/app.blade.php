<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		@if(isset($page_title))
			<title>{{ $page_title }} - {{ env('APP_NAME') }}</title>
		@else
			<title>{{ env('APP_NAME') }}</title>
		@endif

		<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
	</head>
	<body>
		<div class="js-animsition animsition" id="site-wrap" data-animsition-in-class="fade-in" data-animsition-out-class="fade-out">
			@include('layouts.navbar')
			@yield('content')
			@include('layouts.footer')
			@include('layouts.js')
		</div>
	</body>
</html>