<!-- End of .header-top -->
			<nav class="navbar bg-white">
				<div class="container">
					<div class="navbar-inner">
						<div class="brand-logo-container">
							<a href="index.html">
								<img src="{{asset('public/frontend/assets/images/logo-black.svg')}}" alt="" class="brand-logo">
							</a>
						</div>
						<!-- End of .brand-logo-container -->
						<div class="main-nav-wrapper">
							<ul class="main-navigation list-inline" id="main-menu">
								<li class="has-dropdown">
									<a href="#">Home</a>
									<ul class="submenu">
										<li><a href="index.html">Home One</a></li>
										<li><a href="home-2.html">Home Two</a></li>
										<li><a href="home-3.html">Home Three</a></li>
										<li><a href="home-4.html">Home Four</a></li>
										<li><a href="home-5.html">Home Five</a></li>
									</ul>
									<!-- End of .submenu -->
								</li>
								<li class="has-dropdown">
									<a href="#">Posts</a>
									<ul class="submenu">
										<li class="has-dropdown">
											<a href="#">Post Layout</a>
											<ul class="submenu">
												<li><a href="post-layout-one.html">Post Layout 1</a></li>
												<li><a href="post-layout-two.html">Post Layout 2</a></li>
												<li><a href="post-layout-three.html">Post Layout 3</a></li>
												<li><a href="post-layout-four.html">Post Layout 4</a></li>
												<li><a href="post-layout-five.html">Post Layout 5</a></li>
											</ul>
											<!-- End of .submenu -->
										</li>
										<li class="has-dropdown">
											<a href="#">Post Format</a>
											<ul class="submenu">
												<li><a href="post-format-standard.html">Post Format Standard</a>
												</li>
												<li><a href="post-format-video.html">Post Format Video</a></li>
												<li><a href="post-format-audio.html">Post Format Audio</a></li>
												<li><a href="post-format-gallery.html">Post Format Gallery</a></li>
												<li><a href="post-format-quote.html">Post Format Quote</a></li>
												<li><a href="post-format-text-only.html">Post Format Text Only</a>
												</li>
											</ul>
											<!-- End of .submenu -->
										</li>
									</ul>
									<!-- End of .submenu -->
								</li>

								{{-- category dynamic --}}
								@if (isset($category))
									@foreach ($category as $cat)
								     <li><a href="{{route('articles',['category' => $cat->slug])}}">{{$cat->name}}</a></li>
								    @endforeach	
								@endif

								{{-- category dynamic end here --}}
								<li class="has-dropdown">
									<a href="#">Pages</a>
									<ul class="submenu">
										<li><a href="author.html">Author</a></li>
										<li><a href="error-404.html">404 Error</a></li>
										<li><a href="under-construction.html">Coming Soon</a></li>
										<li><a href="about-us.html">About Us</a></li>
										<li><a href="team.html">Team</a></li>
										<li><a href="contact.html">Contact Us</a></li>
									</ul>
									<!-- End of .submenu -->
								</li>
							</ul>
							<!-- End of .main-navigation -->
						</div>
						<!-- End of .main-nav-wrapper -->
						<div class="navbar-extra-features ml-auto">
							<form action="#" class="navbar-search">
								<div class="search-field">
									<input type="text" class="navbar-search-field" placeholder="Search Here...">
									<button class="navbar-search-btn" type="button"><i
											class="fal fa-search"></i></button>
								</div>
								<!-- End of .search-field -->
								<a href="#" class="navbar-search-close"><i class="fal fa-times"></i></a>
							</form>
							<!-- End of .navbar-search -->
							<a href="#" class="nav-search-field-toggler" data-toggle="nav-search-feild"><i
									class="far fa-search"></i></a>
							<a href="#" class="side-nav-toggler" id="side-nav-toggler">
								<span></span>
								<span></span>
								<span></span>
							</a>
						</div>
						<!-- End of .navbar-extra-features -->
						<div class="main-nav-toggler d-block d-lg-none" id="main-nav-toggler">
							<div class="toggler-inner">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
						<!-- End of .main-nav-toggler -->
					</div>
					<!-- End of .navbar-inner -->
				</div>
				<!-- End of .container -->
			</nav>
			<!-- End of .navbar -->
			</header>