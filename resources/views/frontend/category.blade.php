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
						<li class="breadcrumb-item">Articles</li>
						<li class="breadcrumb-item active" aria-current="page">{{$slug}}</li>
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
							<h2 class="m-b-xs-0 axil-post-title hover-line">{{uppercase($slug)}}</h2>
						</div>
						<!-- End of .post-title-wrapper -->
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
							<div class="add-container m-b-xs-60">
								<a href="#"><img src="{{asset('public/frontend/assets/images/clientbanner/clientbanner.jpg')}}" alt="add one"
										class="img-fluid"></a>
							</div>

							@if (isset($data) && $data->count() > 0)
								@foreach ($data as $dd)
									

							<div class="media post-block post-block__mid m-b-xs-30">
								<a href="post-format-standard.html" class="align-self-center"><img class=" m-r-xs-30" style="width:300px!important;" 
										src="{{asset('public/images/posts/'.$dd->images)}}" alt=""></a>
								<div class="media-body">
									<div class="post-cat-group m-b-xs-10">
										<a href="business.html" class="post-cat cat-btn bg-color-blue-one">{{$dd->category->pluck('name')->first()}}</a>
									</div>
									<h3 class="axil-post-title hover-line hover-line"><a
											href="{{route('get_post',$dd->slug)}}">{{$dd->title}}</a></h3>
									<p class="mid">{{$dd->featured_description}}.</p>
									<div class="post-metas">
										<ul class="list-inline">
											<li>By <a href="{{route('fetch_auther',$dd->user->name)}}">{{uppercase($dd->user->name)}}</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
							@endforeach
							@else
							<h2 class="text-center">Waiting for posts....</h2>
							@endif
						</main>
						<!-- End of .axil-content -->
						{{$data->appends(request()->input())->links()}}
					</div>
					<!-- End of .col-lg-8 -->
					@include('frontend.partials.aside')
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


	<script>
		
		
	</script>
	
		@endpush


		@endsection()
		