@extends('frontend.layout.app')
@push('css')

	<!-- Icon fonts
    	======================================== -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,500i,700,700i,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/fontawesome-all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/iconfont.css')}}">
	<!-- css links
    	======================================== -->
	<!-- Bootstrap link -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/vendor/bootstrap.min.css')}}">
	<!-- Link Swiper's CSS -->
	<link rel="stylesheet" href="{{asset('public/frontend/assets/css/vendor/owl.carousel.min.css')}}">
	<!-- Magnific popup -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/vendor/magnific-popup.css')}}">
	<!-- Animate css -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/vendor/animate.css')}}">

	<!-- Custom css -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/style.css')}}">		
		@endpush			
			
		@section('content')
		<div class="breadcrumb-wrapper">
			<div class="container">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
					</ol>
					<!-- End of .breadcrumb -->
				</nav>
			</div>
			<!-- End of .container -->
		</div>
		<!-- End of .breadcrumb-container -->

		<!-- Banner starts -->
		<section class="banner banner__default bg-grey-light-three">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-12">
						<div class="post-title-wrapper">
							<h2 class="m-b-xs-0 axil-post-title hover-line">Contact Us</h2>
						</div>
						<!-- End of .post-title-wrapper -->
					</div>
					<!-- End of .col-lg-8 -->
				</div>
			</div>
			<!-- End of .container -->
		</section>
		<!-- End of .banner -->

		<div class="axil-about-us section-gap  section-gap-top__with-text">
			<div class="container">

				<div class="section-title d-block text-center">
					<h2 class="axil-title m-b-xs-20">Meet Our Publishing Authors</h2>
					<p>Wherever & whenever you need us. We are here for you - contact us for all your support needs,
						<br>be it technical, general queries or information support.</p>
				</div>

				<figure class="m-b-xs-30 p-t-xs-10">
					<img src="{{asset('public/frontend/assets/images/contact-banner.jpg')}}" alt="contact banner" class="img-fluid mx-auto">
				</figure>
			</div>
			<!-- End of .container -->
		</div>
		<!-- End of .section-gap -->

		<section class="contact-form section-gap bg-grey-light-three ">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-7">
					@if(Session::has('success'))
					
						<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Owsum! </strong> {{Session::get('success')}}
					</div>
					@endif
						<div class="axil-contact-form-block m-b-xs-30">
							<div class="section-title d-block">
								<h2 class="h3 axil-title m-b-xs-20">
									Send Us a Message
								</h2>
								<p>Your email address will not be published.
									All the fields are required.
								</p>
							</div>
							<!-- End of .section-title -->

							<div class="axil-contact-form-wrapper p-t-xs-10">
								<form action="{{route('contact_us_form')}}" id="contact_form" method="post" class="axil-contact-form row no-gutters">
									@csrf
									<div class="form-group col-12">
										<label for="contact-name">Name</label>
										<input type="text" name="contact_name" id="contact-name">
										@error('contact_name')
										<span style="color:red;">{{$message}}</span>
										@enderror()
									</div>

									<div class="form-group col-12">
										<label for="contact-phone">Phone</label>
										<input type="text" name="contact_phone" id="contact-phone">
										@error('contact_phone')
										<span style="color:red;">{{$message}}</span>
										@enderror()
										
									</div>

									<div class="form-group col-12">
										<label for="contact-email">Email</label>
										<input type="email" name="contact_email" id="contact-email">
										@error('contact_email')
										<span style="color:red;">{{$message}}</span>
										@enderror()
									</div>

									<div class="form-group col-12">
										<label for="contact-message">Message</label>
										<textarea name="contact_message" id="contact-message"></textarea>
										@error('contact_message')
										<span style="color:red;">{{$message}}</span>
										@enderror()
									</div>

									<div class="col-12">
										<button onclick="submit_form()" class="btn btn-primary m-t-xs-0 m-t-lg-20">SUBMIT</button>
									</div>
								</form>
								<!-- End of .axil-contact-form -->
							</div>
							<!-- End of .axil-contact-form-wrapper -->
						</div>
						<!-- End of .axil-contact-form-block -->
					</div>
					<!-- End of .col-lg-6 -->

					<div class="col-lg-5">
						<div class="axil-contact-info-wrapper p-l-md-45 m-b-xs-30">
							<div class="axil-contact-info-inner">
								<h2 class="h4 m-b-xs-10">
									Contact Information
								</h2>
								<div class="axil-contact-info">
									<address class="address">
										<p class="mid m-b-xs-30">Theodore Lowe, Ap #867-859<br>Sit Rd, Azusa New
											York</p>

										<div class="h5 m-b-xs-10">We're Available 24/ 7. Call Now.</div>
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
						<!-- End of .axil-contact-info-wrapper -->
					</div>
					<!-- End of .col-lg-6 -->
				</div>
				<!-- End of .row -->
			</div>
			<!-- End of .container -->
		</section>
		<!-- End of .contact-form -->

		<section class="section-gap our-location section-gap-top__with-text">
			<div class="container">
				<div class="section-title">
					<h2 class="axil-title m-b-xs-40">
						Our Location
					</h2>
				</div>
				<!-- End of .section-title -->

				<div class="axil-map-wrapper m-b-xs-30">

					<iframe
						src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d848618.3019582209!2d-117.3496119!3d33.8145003!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c64ed3c3ce8f%3A0x8710c5557f723e2a!2s106+W+1st+St%2C+Los+Angeles%2C+CA+90012%2C+USA!5e0!3m2!1sen!2sbd!4v1563866499894!5m2!1sen!2sbd"
						width="600" height="450" allowfullscreen></iframe>
				</div>
				<!-- End of .axil-map-wrapper -->
			</div>
			<!-- End of .container -->
		</section>
		<!-- End of .our-location -->

	
		@push('scripts')
			{{-- <script src="{{asset('public/frontend/assets/js/vendor/jquery-migrate.min.js')}}"></script> --}}
	<!-- jQuery Easing Plugin -->
	<script src="{{asset('public/frontend/assets/js/vendor/easing-1.3.js')}}"></script>
	<!-- Waypoints js -->
	<script src="{{asset('public/frontend/assets/js/vendor/jquery.waypoints.min.js')}}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{asset('public/frontend/assets/js/vendor/owl.carousel.min.js')}}"></script>
	<!-- Slick Carousel JS -->
	<script src="{{asset('public/frontend/assets/js/vendor/slick.min.js')}}"></script>
	<!-- Bootstrap js -->
	<script src="{{asset('public/frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('public/frontend/assets/js/vendor/isotope.pkgd.min.js')}}"></script>
	<!-- Counter up js -->
	<script src="{{asset('public/frontend/assets/js/vendor/jquery.counterup.js')}}"></script>
	<!-- Magnific Popup js -->
	<script src="{{asset('public/frontend/assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
	<!-- Nicescroll js -->
	<script src="{{asset('public/frontend/assets/js/vendor/jquery.nicescroll.min.js')}}"></script>
	<!-- IF ie -->
	{{-- <script src="https://cdn.jsdelivr.net/npm/css-vars-ponyfill@2"></script> --}}
	<!-- Plugins -->
	{{-- <script src="{{asset('public/frontend/assets/js/plugins.js')}}"></script> --}}
	<!-- Custom Script -->
	<script src="{{asset('public/frontend/assets/js/main.js')}}"></script>


		@endpush
		<script>
			function submit_form(){

					document.getElementById('contact_form').submit();
				}
		</script>


		
		
@endsection()