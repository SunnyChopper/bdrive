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
						<li><a href="/public-courses" class="animsition-link">Public Courses</a></li>
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
						<li><a href="/login" class="animsition-link">Members</a>
							<ul>
								<li><a href="/login">Login</a></li>
								<li><a href="/register">Register</a></li>
							</ul>
						</li>
					@elseif(session()->has('backend_auth'))
						<li><a href="/admin/dashboard" class="animsition-link">Dashboard</a></li>
						<li><a href="/admin/posts/view" class="animsition-link">Blog Posts</a>
							<ul>
								<li><a href="/admin/posts/new">New Blog Post</a></li>
								<li><a href="/admin/posts/stats">View Post Stats</a></li>
							</ul>
						</li>
						<li><a href="/admin/premium/view" class="animsition-link">Premium Content</a>
							<ul>
								<li><a href="/admin/premium/new">New Premium Content</a></li>
							</ul>
						</li>
						<li><a href="/admin/public-courses/view">Public Courses</a></li>
						<li><a href="/admin/lead-magnets/view" class="animsition-link">Lead Magnets</a>
							<ul>
								<li><a href="/admin/lead-magnets/new">New Lead Magnet</a></li>
							</ul>
						</li>
					@else
						<li><a href="/members/dashboard" class="animsition-link">Dashboard</a></li>
						<li><a href="/public-courses" class="animsition-link">Public Courses</a></li>
						<li><a href="/members/content-bank/view" class="animsition-link">Content Bank</a>
							<ul>
								<li><a href="/members/content-bank/new">Upload Content</a></li>
								<li><a href="/members/content-bank/my">My Content</a></li>
							</ul>
						</li>
						<li><a href="/members/profile/{{ Auth::id() }}" class="animsition-link">{{ Auth::user()->first_name }}</a>
							<ul>
								<li><a href="/members/logout">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</nav>
		</div>
	</div>
</header>