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
						<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Author</li>
						<li class="breadcrumb-item active" aria-current="page">{{uppercase($user->name)}}</li>
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
						<div class="author-details-block">
							<div class="media post-block post-block__mid m-b-xs-0">
								<a href="post-format-standard.html" class="align-self-center">
									<img class="m-r-xs-30" src="{{asset('public/images/user/'.$user->thumbnail)}}" alt="author image">
									<div class="grad-overlay__transparent overlay-over"></div>
								</a>
								<div class="media-body">
									<h2 class="h4 m-b-xs-15">{{uppercase($user->name)}}</h2>
									<!-- <p class="hover-line"><a href="#">https//www.naseem.com</a></p> -->
									<p class="mid">{{$user->description}}</p>
									<div class="post-metas">
										<ul class="list-inline">
											<li><a href="#"><i class="fal fa-user-edit"></i>Total Post ({{$user->post->count() > 0 ? $user->post->count() : 0}})</a></li>
											<li><a href="#"><i class="fal fa-comment"></i>Comments ({{$user->posts()->count()}})</a></li>
										</ul>

									</div>
									<div class="author-social-share">
										<ul class="social-share social-share__with-bg">
											<li><a href="{{route('fetch_auther',$user->name)}}"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="{{route('fetch_auther',$user->name)}}"><i class="fab fa-twitter"></i></a></li>
											<li><a href="{{route('fetch_auther',$user->name)}}"><i class="fab fa-behance"></i></a></li>
											<li><a href="{{route('fetch_auther',$user->name)}}"><i class="fab fa-linkedin-in"></i></a></li>
										</ul>
									</div>
									<!-- End of .author-social-share -->
								</div>
								<!-- End of  .media-body -->
							</div>
							<!-- End of .media -->
						</div>
						<!-- End of .author-details-block -->
					</div>
					<!-- End of .col-lg-8 -->
				</div>
			</div>
			<!-- End of .container -->
		</section>
		<!-- End of .banner -->

		<div class="random-posts section-gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<main class="axil-content">
							<h2 class="h3 m-b-xs-40">Articles By This Author</h2>
							@if($user->post->count() > 0)
								@foreach ($user->post_latest as $key=>$u_post)
									
								
							
							<div class="media post-block post-block__mid m-b-xs-30">
								
								<a href="post-format-standard.html" class="align-self-center"><img class=" m-r-xs-30"
										src="{{asset('public/images/posts/'.$u_post->images)}}" alt="" style="width:270px!important;" ></a>

								<div class="media-body">
									<div class="post-cat-group m-b-xs-10">
										<a href="business.html" class="post-cat cat-btn bg-color-{{get_random_color()}}">{{$u_post->category->pluck('name')->first()}}</a>
									</div>
									<h3 class="axil-post-title hover-line hover-line"><a
											href="{{route('get_post',$u_post->slug)}}">{{$u_post->title}}</a></h3>
									<p class="mid">{{$u_post->featured_description}}</p>
									<div class="post-metas">
										<ul class="list-inline">
											<li>By <a href="{{route('get_post',$u_post->slug)}}">{{uppercase($u_post->user->name)}}</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
							@if($key >= 8)
							
								@break
							
							@endif
							@endforeach
						@endif()

						</main>
						<!-- End of .axil-content -->
					</div>
					<!-- End of .col-lg-8 -->

					@include('frontend.partials.aside')
					{{-- @include('frontend.partials.top_nav') --}}

				</div>
				<!-- End of .row -->
			</div>
			<!-- End of .container -->
		</div>
		<!-- End of .random-posts -->

		

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


		@endsection()
		