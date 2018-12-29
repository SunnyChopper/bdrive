<header class="templateux-navbar dark" role="banner">
	<div class="container"  data-aos="fade-down">
		<div class="row">
			<div class="col-3 templateux-logo">
				<a href="/" class="animsition-link">BillionairesDrive</a>
			</div>
			<nav class="col-9 site-nav">
				<button class="d-block d-md-none hamburger hamburger--spin templateux-toggle templateux-toggle-light ml-auto templateux-toggle-menu" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle navigation">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button> <!-- .templateux-toggle -->

				<ul class="sf-menu templateux-menu d-none d-md-block">
					@if(Auth::guest())
						<li><a href="/" class="animsition-link">Home</a></li>
						<li><a href="/courses" class="animsition-link">Courses</a></li>
						{{-- <li><a href="/tools" class="animsition-link">Tools</a></li> --}}
						{{-- <li><a href="/services" class="animsition-link">Services</a></li> --}}
						<li><a href="/blog">Advice & Tips</a></li>
						{{-- <li>
							<a href="/knowledge-bank" class="animsition-link">Knowledge Bank</a>
							<ul>
								<li><a href="/blog">Advice & Tips</a></li>
								<li><a href="/books">Books</a></li>
								<li><a href="/recommended">Extra Material</a></li>
							</ul>
						</li> --}}
						<li><a href="/contact" class="animsition-link">Contact</a></li>
					@elseif(session()->has('backend_auth'))
						<li><a href="/admin/dashboard" class="animsition-link">Dashboard</a></li>
						<li><a href="/admin/posts/view" class="animsition-link">Blog Posts</a>
							<ul>
								<li><a href="/admin/posts/new">New Blog Post</a></li>
								<li><a href="/admin/posts/stats">View Post Stats</a></li>
							</ul>
						</li>
						<li><a href="/admin/lead-magnets/view" class="animsition-link">Lead Magnets</a>
							<ul>
								<li><a href="/admin/lead-magnets/new">New Lead Magnet</a></li>
							</ul>
						</li>
					@else
					@endif
				</ul>
			</nav>
		</div>
	</div>
</header>