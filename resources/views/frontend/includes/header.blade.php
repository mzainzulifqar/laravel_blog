<!DOCTYPE html>

<html class="no-js" lang="zxx">
<!--<![endif]-->


<head>
	<!-- Basic metas
    	======================================== -->
	<meta charset="utf-8">
	<meta name="author" content="">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<!-- Mobile specific metas
    	======================================== -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Twitter -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@Papr">
	<meta name="twitter:creator" content="@Papr">
	<meta name="twitter:title" content="Papr">
	<meta name="twitter:description" content="Papr Trendy News and Megazine Template">
	<meta name="twitter:image" content="{{asset('public/frontend/assets/images/papr.png')}}">
	<!-- Facebook -->
	<meta property="og:url" content="">
	<meta property="og:title" content="Papr">
	<meta property="og:description" content="Papr Trendy News and Megazine Template">
	<meta property="og:type" content="website">
	<meta property="og:image" content="{{asset('public/frontend/assets/images/papr.png')}}">
	<meta property="og:image:secure_url" content="">
	<meta property="og:image:type" content="image/png">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="630">
	
	<!-- Page Title
    	======================================== -->
	<title>Home</title>
	<!-- links for favicon
    	======================================== -->
	<link rel="apple-touch-icon" sizes="57x57" href="{{asset('public/frontend/assets/favicon/apple-icon-57x57.png')}}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{asset('public/frontend/assets/favicon/apple-icon-60x60.png')}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{asset('public/frontend/assets/favicon/apple-icon-72x72.png')}}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/frontend/assets/favicon/apple-icon-76x76.png')}}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{asset('public/frontend/assets/favicon/apple-icon-114x114.png')}}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{asset('public/frontend/assets/favicon/apple-icon-120x120.png')}}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{asset('public/frontend/assets/favicon/apple-icon-144x144.png')}}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{asset('public/frontend/assets/favicon/apple-icon-152x152.png')}}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/frontend/assets/favicon/apple-icon-180x180.png')}}">
	<link rel="icon" type="image/png" sizes="192x192" href="{{asset('public/frontend/assets/favicon/android-icon-192x192.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/frontend/assets/favicon/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('public/frontend/assets/favicon/favicon-96x96.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/frontend/assets/favicon/favicon-16x16.png')}}">
	
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="{{asset('public/frontend/assets/favicon/ms-icon-144x144.png')}}">
	<meta name="theme-color" content="#ffffff">
	
	@stack('css')
</head>

<body>
	<!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
	{{-- <div class="subscribe-popup" id="subscribe-popup">
		<div class="subscribe-popup-inner">
			<div class="close-popup">
				<i class="fal fa-times"></i>
			</div>
			<div class="row no-gutters">
				<div class="col-lg-6">
					<div class="img-container">
						<img src="{{asset('public/frontend/assets/images/subscribe-popup-img.jpg')}}" alt="subscribe img">
					</div>
				</div>
				<!-- End of .col-lg-6 -->
				<div class="col-lg-6">
					<div class="newsletter-widget weekly-newsletter bg-grey-light-three">
						<div class="newsletter-content">
							<div class="newsletter-icon">
								<i class="feather icon-send"></i>
							</div>
							<div class="section-title">
								<h3 class="axil-title">Subscribe To Our Weekly Newsletter</h3>
								<p class="mid m-t-xs-10 m-b-xs-20">No spam, notifications only about new
									products,
									updates.</p>
							</div>
							<!-- End of .section-title -->
							<div class="subscription-form-wrapper">
								<form method="post" class="subscription-form" id="subscriber-form">
									@csrf
									
									<div class="form-group form-group-small m-b-xs-20">
										<label for="subscription-email">Enter Email Address</label>
										<input type="text" name="subscriber_email" id="subscription-email">
										<span id="sub_error" style="color:red"></span>
										<span id="sub_success" style="color:green"></span>
									</div>
									<div class="m-b-xs-0">
										<input id="add_sub" type="submit" value="Subscribe" class="btn btn-primary btn-small">
									</div>
								</form>
								<!-- End of .subscription-form -->
							</div>
							<!-- End of .subscription-form-wrapper -->
						</div>
						<!-- End of .newsletter-content -->
					</div>
					<!-- End of .newsletter-widget -->
				</div>
				<!-- End of .col-lg-6 -->
			</div>
			<!-- End of .row -->
		</div>
		<!-- End of .subscribe-popup-inner -->
	</div> --}}
	<!-- End of .subscribe-popup -->
	<!-- Main contents
	================================================ -->
	<div class="main-content">
		<div class="side-nav">
			<div class="side-nav-inner nicescroll-container">
				<form action="{{route('search_post')}}" method="get" class="side-nav-search-form">
					<div class="form-group search-field">
						<input type="text" class="search-field" name="query" placeholder="Search...">
						<button class="side-nav-search-btn"><i class="fas fa-search"></i></button>
					</div>
					<!-- End of .side-nav-search-form -->
				</form>
				<!-- End of .side-nav-search-form -->
				<div class="side-nav-content">
					<div class="row ">
						<div class="col-lg-6">
							<ul class="main-navigation side-navigation list-inline flex-column">
								@if($category->count())
								@foreach ($category as $cat)
									
								
								<li><a href="{{route('get_category_related_posts',['category' => $cat->slug])}}">{{$cat->name}}</a></li>
								@endforeach
								@endif

							</ul>
							<!-- End of .main-navigation -->
						</div>
						<!-- End of  .col-md-6 -->
						<div class="col-lg-6">
							<div class="axil-contact-info-inner">
								<h5 class="h5 m-b-xs-10">
									Contact Information
								</h5>
								<div class="axil-contact-info">
									<address class="address">
										<p class="m-b-xs-30  mid grey-dark-three ">Theodore Lowe, Ap
											#867-859<br>Sit Rd, Azusa New York</p>
										<div class="h5 m-b-xs-5">We're Available 24/ 7. Call Now.</div>
										<div>
											<a class="tel" href="tel:8884562790"><i class="fas fa-phone"></i>(888)
												456-2790</a>
										</div>
										<div>
											<a class="tel" href="tel:12125553333"><i class="fas fa-fax"></i>(121)
												255-53333</a>
										</div>
									</address>
									<!-- End of address -->
									<div class="contact-social-share m-t-xs-30">
										 <div class="axil-social-title h5">Follow Us</div>
										<ul class="social-share social-share__with-bg">
											<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="#"><i class="fab fa-twitter"></i></a></li>
											<li><a href="#"><i class="fab fa-behance"></i></a></li>
											<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
										</ul>
									</div>
									<!-- End of .contact-shsdf -->
								</div>
								<!-- End of .axil-contact-info -->
							</div>
							<!-- End of .axil-contact-info-inner -->
						</div>
					</div>
					<!-- End of .row -->
				</div>
			</div>
			<!-- End of .side-nav-inner -->
			<div class="close-sidenav" id="close-sidenav">
				<div></div>
				<div></div>
			</div>
		</div>
		<!-- End of .side-nav -->
		<!-- Header starts -->
		<header class="page-header">
			<div class="header-top bg-grey-dark-one">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md">
							<ul class="header-top-nav list-inline justify-content-center justify-content-md-start">
								<li class="current-date">25 July, 2019</li>
								<li><a href="#">Advertisement</a></li>
								<li><a href="{{route('about_us')}}">About</a></li>
								<li><a href="{{route('contact_us')}}">Contact</a></li>
							</ul>
							<!-- End of .header-top-nav -->
						</div>
						<div class="col-md-auto">
							<ul class="ml-auto social-share header-top__social-share">
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-instagram"></i></a></li>
								<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
							</ul>
						</div>
					</div>
					<!-- End of .row -->
				</div>
				<!-- End of .container -->
			</div>