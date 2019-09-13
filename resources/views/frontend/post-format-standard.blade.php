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
						<li class="breadcrumb-item"><a href="javascipt:">Post</a></li>
						<li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
					</ol>
					<!-- End of .breadcrumb -->
				</nav>
			</div>
			<!-- End of .container -->
		</div>
		<!-- End of .breadcrumb-container -->

		<!-- Banner starts -->
		<section class="banner banner__single-post banner__standard">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="post-title-wrapper">
							<div class="btn-group">
								<a href="#" class="cat-btn bg-color-{{get_random_color()}}">{{uppercase($post->category->pluck('name')->first())}}</a>
							</div>

							<h2 class="m-t-xs-20 m-b-xs-0 axil-post-title hover-line">{{$post->title}}
							</h2>
							<div class="post-metas banner-post-metas m-t-xs-20">
								<ul class="list-inline">
									<li><a href="{{route('fetch_auther',$post->user->name)}}" class="post-author post-author-with-img"><img 
												src="{{asset('public/images/user/'.$post->user->thumbnail)}}" alt="author">{{$post->user->name}}</a></li>
									<li><a href="#"><i class="feather icon-activity"></i>{{thousandsCurrencyFormat($post->views)}} Views</a></li>
									<li><a href="#"><i class="feather icon-share-2"></i>230 Shares</a></li>
								</ul>
							</div>
							<!-- End of .post-metas -->
						</div>
						<!-- End of .post-title-wrapper -->
					</div>
					<!-- End of .col-lg-6 -->

					<div class="col-lg-6">
						<img src="{{asset('public/images/posts/'.$post->images)}}" alt="" class="img-fluid" width="600" height="600">
					</div>
				</div>
				<!-- End of .row -->
			</div>
			<!-- End of .container -->
		</section>
		<!-- End of .banner -->

		<!-- post-single-wrapper starts -->
		<div class="post-single-wrapper p-t-xs-60">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<main class="site-main">
							<article class="post-details">
								<div class="single-blog-wrapper">
									<div class="post-details__social-share mt-2">
										<ul class="social-share social-share__with-bg social-share__vertical">
											<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="#"><i class="fab fa-twitter"></i></a></li>
											<li><a href="#"><i class="fab fa-behance"></i></a></li>
											<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
										</ul>
										<!-- End of .social-share__no-bg -->
									</div>
									<!-- End of .social-share -->

										{!!$post->body!!}
								</div>
								<div class="post-shares m-t-xs-60">
								<div class="title">Tags:</div>
								<ul class="social-share social-share__rectangular">
									@if (isset($post) && $post->tags->count() > 0)
										@foreach($post->tags as $tags)
										
									<li><a href="#" class="btn bg-color-{{get_random_color()}}">
											{{uppercase($tags->name)}}</a>
									</li>

									@endforeach()
									@endif
									
								</ul>
							</div>
								<!-- End of .single-blog-wrapper -->

							</article>
							<!-- End of .post-details -->

							<div class="post-shares m-t-xs-60">
								<div class="title">SHARE:</div>
								<ul class="social-share social-share__rectangular">
									<li><a href="#" class="btn bg-color-twitch"><i class="fab fa-twitch"></i>
											1K+</a>
									</li>
									<li><a href="#" class="btn bg-color-facebook"><i class="fab fa-facebook-f"></i>
											1K+</a>
									</li>

									<li><a class="btn bg-color-twitter" data-size="large" href="https://twitter.com/intent/tweet?text=View this post {{route('get_post',$post->slug)}}
													"><i class="fab fa-twitter"></i></a>
									</li>
									<li><a href="#" class="btn bg-color-linkedin"><i
												class="fab fa-linkedin-in"></i>1M+</a>
									</li>
								</ul>
							</div>



							<!-- End of .post-shares -->

							<hr class="m-t-xs-50 m-b-xs-60">

							<div class="about-author m-b-xs-60">
								<div class="media">
									<a href="{{route('fetch_auther',$post->user->name)}}"><img class="author-img" src="{{asset('public/images/user/'.$post->user->thumbnail)}}"
											alt=""></a>
									<div class="media-body">
										<div class="media-body-title">
											<h3><a href="{{route('fetch_auther',$post->user->name)}}">{{uppercase($post->user->name)}}</a></h3>
										</div>
										<!-- End of .media-body-title -->

										<div class="media-body-content">
											<p>{{$post->user->description}}At 29 years old, my favorite compliment is being told that I look
												like my
												mom.
												Seeing myself in her image, like this daughter up top, makes me so
												proud
												of
												how
												far I’ve come, and so thankful for where I come from.</p>
											<ul class="social-share social-share__with-bg">
												<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
												
												
												<li><a href="https://twitter.com/intent/tweet?text=https://www.youtube.com/watch?v=bUXdEU6kH6A&list=PLvc_4FFg5org9DcqGS1i6Bz7bgt1apkn1&index=3
													"><i class="fab fa-twitter"></i></a></li>
												<li><a href="#"><i class="fab fa-behance"></i></a></li>
												<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
											</ul>
											<!-- End of .social-share__no-bg -->
										</div>
										<!-- End of .media-body-content -->
									</div>
								</div>
							</div>
							<!-- End of .about-author -->

							<div class="comment-box">
								<h2>Leave A Reply</h2>
								<p>Your email address will not be published.<span class="primary-color">*</span></p>
							</div>
							<!-- End of .comment-box -->

							<form action="{{route('post_comment')}}" method="post" class="comment-form row m-b-xs-60">
								@csrf
								
								<div class="col-12">
									<div class="form-group comment-message-field">
										<label for="comment-message">Comment</label>
										<textarea name="comment_message" id="comment-message" rows="6"></textarea>
										<input type="hidden" name="post_id" value="{{$post->id}}">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" name="name" id="name">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="email">Email</label>
										<input type="text" name="email" id="email">
									</div>
								</div>


								<div class="col-12">
									<button class="btn btn-primary">POST COMMENT</button>
								</div>
							</form>

							<div class="row">
								<div class="col-md-12" id="comment">
									<h2 style="padding-bottom: 10px;">Comments</h2>
									@if (Session::has('success'))
										
									
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<strong>CoOl! </strong> {{Session::get('success')}}
									</div>

									@endif

									@foreach ($post->comments as $pc)
										
									
									<!-- Left-aligned -->
									<div class="media" style="margin-bottom:15px!important;">
									  <div class="media-left">
									    <img src="{{asset('public/images/user/dummy.png')}}" class="media-object" style="width:60px">
									  </div>
									  <div class="media-body" style="padding-left: 10px;">
									    <h4 style="margin-bottom:0px!important;" class="media-heading">{{$pc->name}}</h4>
									   <p style="margin-bottom:0px!important;">{{$pc->comment}}.</p>
									   <span>{{$pc->created_at->toFormattedDateString()}}</span>
									  </div>
									</div>
									@endforeach
									<!-- Right-aligned -->
									
								</div>
							</div>

							<div class="post-navigation-wrapper row  m-b-xs-60">
								@if (isset($random_posts) && $random_posts->count() > 0)
								
																<div class="post-navigation col-lg-6">
									<div class="post-nav-content">
										<a href="{{route('get_post',$random_posts->first()->slug)}}" class="prev-post">
											<i class="feather icon-chevron-left"></i>Previous Post
										</a>
										<h3><a href="{{route('get_post','$random_posts->first()->slug')}}">{{str_limit($random_posts->first()->featured_description,20)}}</a></h3>
									</div>
								</div>
								@php
									$next_post = $random_posts->get(1);
								@endphp
								<div class="post-navigation text-right col-lg-6">
									<div class="post-nav-content">
										<a href="{{route('get_post',$next_post->slug)}}"" class="next-post">
											Next Post<i class="feather icon-chevron-right"></i>
										</a>
										<h3><a href="{{route('get_post','$next_post->slug')}}">{{str_limit($next_post->featured_description,50)}}</a></h3>
									</div>
								</div>
							</div>
							<!-- End of .post-navigation -->
							@endif

						</main>
						<!-- End of main -->
					</div>
					<!--End of .col-auto  -->
					@include('frontend.partials.aside');
				</div>
				<!-- End of .row -->
			</div>
			<!-- End of .container -->
		</div>
		<!-- End of .post-single-wrapper -->

		<section class="related-post p-b-xs-30">
			<div class="container">
				<div class="section-title m-b-xs-40">
					<h2 class="axil-title">Food &amp; Drink</h2>
					<a href="#" class="btn-link ml-auto">All FOOD &amp; DRINK</a>
				</div>
				<!-- End of .section-title -->

				<div class="grid-wrapper">
					<div class="row">
						<div class="col-lg-3 col-md-4">
							<div class="content-block m-b-xs-30">
								<a href="post-format-standard.html">
									<img src="{{asset('public/frontend/assets/images/related-post/related-post-1.jpg')}}" alt="abstruct image"
										class="img-fluid">
									<div class="grad-overlay"></div>
								</a>
								<div class="media-caption">
									<div class="caption-content">
										<h3 class="axil-post-title hover-line hover-line"><a
												href="post-format-standard.html">Barbecue Party Tips For A Truly Amazing
												Event</a></h3>
										<div class="caption-meta">
											By <a href="#">Martin Lambert</a>
										</div>
									</div>
									<!-- End of .content-inner -->
								</div>
							</div>
							<!-- End of .content-block -->
						</div>
						<!-- End of .col-lg-3 -->
						<div class="col-lg-3 col-md-4">
							<div class="content-block m-b-xs-30">
								<a href="post-format-standard.html">
									<img src="{{asset('public/frontend/assets/images/related-post/related-post-1.jpg')}}" alt="abstruct image"
										class="img-fluid">
									<div class="grad-overlay"></div>
								</a>
								<div class="media-caption">
									<div class="caption-content">
										<h3 class="axil-post-title hover-line hover-line"><a
												href="post-format-standard.html">Grilling Tips For The Dog Days Of
												Summer</a></h3>
										<div class="caption-meta">
											By <a href="#">Angu Tamba

											</a>
										</div>
									</div>
									<!-- End of .content-inner -->
								</div>
							</div>
							<!-- End of .content-block -->
						</div>
						<!-- End of .col-lg-3 -->
						<div class="col-lg-3 col-md-4">
							<div class="content-block m-b-xs-30">
								<a href="post-format-standard.html">
									<img src="{{asset('public/frontend/assets/images/related-post/related-post-1.jpg')}}" alt="abstruct image"
										class="img-fluid">
									<div class="grad-overlay"></div>
								</a>
								<div class="media-caption">
									<div class="caption-content">
										<h3 class="axil-post-title hover-line hover-line"><a
												href="post-format-standard.html">Smarter Food Choices 101 Tips For Busy
												Women</a></h3>
										<div class="caption-meta">
											By <a href="#">Naseema Al Morad</a>
										</div>
									</div>
									<!-- End of .content-inner -->
								</div>
							</div>
							<!-- End of .content-block -->
						</div>
						<!-- End of .col-lg-3 -->
						<div class="col-lg-3 col-md-4">
							<div class="content-block m-b-xs-30">
								<a href="post-format-standard.html">
									<img src="{{asset('public/frontend/assets/images/related-post/related-post-1.jpg')}}" alt="abstruct image"
										class="img-fluid">
									<div class="grad-overlay"></div>
								</a>
								<div class="media-caption">
									<div class="caption-content">
										<h3 class="axil-post-title hover-line hover-line"><a
												href="post-format-standard.html">Deep Fryer Pieces Of Wisdom</a></h3>
										<div class="caption-meta">
											By <a href="#">Nayah Tantoh</a>
										</div>
									</div>
									<!-- End of .content-inner -->
								</div>
							</div>
							<!-- End of .content-block -->
						</div>
						<!-- End of .col-lg-3 -->
					</div>
					<!-- End of .row -->
				</div>
				<!-- End of .grid-wrapper -->
			</div>
			<!-- End of .container -->
		</section>
		<!-- End of .related-post -->



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
        $(function() {
        	@if (Session::has('success'))
        		
        	
            $('html, body').animate({
                scrollTop: $("#comment").offset().top
            }, 2000);
         });
        @endif
    </script>


		@endpush


		
		
@endsection()