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
								

								{{-- category dynamic --}}
								
								@if (isset($category))
									@foreach ($category as $cat)

							  <li class="has-dropdown">
									<a @if($cat->category_child->count() < 1) href="{{route('get_category_related_posts',['category' => $cat->slug])}}" @else href="javascript:" @endif>{{$cat->name}}</a>
									@if($cat->category_child->count() > 0)
										<ul class="submenu">
										@foreach ($cat->category_child as $child)
										
								
										<li><a href="{{route('get_category_related_posts',['category' => $child->slug])}}">{{$child->name}}</a></li>
										

										@endforeach
										</ul>
									@endif
									<!-- End of .submenu -->
								</li>
								    @endforeach	
								@endif

								{{-- category dynamic end here --}}
							
							</ul>
							<!-- End of .main-navigation -->
						</div>
						<!-- End of .main-nav-wrapper -->
						<div class="navbar-extra-features ml-auto">
							<form action="{{route('search_post')}}" method="get" class="navbar-search">
								<div class="search-field">
									<input type="text" class="navbar-search-field"  name="query" placeholder="Search Here...">
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