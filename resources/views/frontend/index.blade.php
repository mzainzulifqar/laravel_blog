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
		
		<!-- End of .page-header -->
		<div class="recent-news-wrapper section-gap p-t-xs-15 p-t-sm-60">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="axil-latest-post">
								

							@if(isset($top_post))
							<div class="media post-block m-b-xs-20">
								<figure class="fig-container">
									<a href="post-format-standard.html"><img src="{{asset('public/images/posts/'.$top_post->images)}}"
											alt="latest post"></a>
									<div class="post-cat-group m-b-xs-10">
										<a href="{{ route('get_category_related_posts',$top_post->category->pluck('name')->first()) }}"
											class="post-cat cat-btn bg-color-blue-one">{{$top_post->category->pluck('name')->first()}}</a>
									</div>
								</figure>
								<div class="media-body">
									<h3 class="axil-post-title hover-line hover-line"><a
											href="{{route('get_post',$top_post->slug)}}">{{$top_post->title}}.</a></h3>
									<div class="post-metas">
										<ul class="list-inline">
											<li>By <a href="{{route('fetch_auther',$top_post->user->name)}}" class="post-author">{{$top_post->user->name}}</a></li>
											<li><i class="dot">.</i>{{$top_post->created_at->toFormattedDateString()}}</li>
											<li><a href="#"><i class="feather icon-activity"></i>{{thousandsCurrencyFormat($top_post->views)}} Views</a></li>
											<li><a href="#"><i class="feather icon-share-2"></i>230 Shares</a></li>
										</ul>
									</div>
								</div>
							</div>
							@else
							<h2 class="text-center">Waiting for Stories</h2>
							@endif
							<!-- End of .post-block -->


						</div>
						<!-- End of .latest-post -->
					</div>
					<!-- End of .col-lg-6 -->
					<div class="col-lg-6">
						<div class="axil-recent-news">
							<div class="section-title d-flex m-b-xs-30">
								<h2 class="axil-title">Recent News</h2>
								<a href="#" class="btn-link ml-auto">ALL RECENT NEWS</a>
							</div>
							<!-- End of .section-title -->
							<div class="axil-content">
								@if(isset($posts) && $posts->count() > 0)
								@foreach ($posts as $post)
								<div class="media post-block m-b-xs-30">
									<a href="post-format-standard.html" class="align-self-center"><img
											class=" m-r-xs-30" src="{{asset('public/images/posts/'.$post->images)}}" alt=""></a>
									<div class="media-body">
										<div class="post-cat-group m-b-xs-10">
											<a href="{{ route('get_category_related_posts',$post->category->pluck('name')->first()) }}"
												class="post-cat cat-btn bg-color-{{get_random_color()}}">{{$post->category->pluck('name')->first()}}</a>
										</div>

										<h3 class="axil-post-title hover-line hover-line"><a
												href="{{route('get_post',$post->slug)}}">{{$post->title}}</a></h3>
										<div class="post-metas">
											<ul class="list-inline">
												<li>By <a href="{{route('fetch_auther',$post->user->name)}}">{{uppercase($post->user->name)}}</a></li>
											</ul>
										</div>
									</div>
								</div>
								
								@endforeach
								@else
								<h2 class="text-center">Waiting for posts</h2>
								@endif
								<!-- End of .post-block -->
								
							</div>
							<!-- End of .content -->
						</div>
						<!-- End of .recent-news -->
					</div>
					<!-- End of .col-lg-6 -->
				</div>
				<!-- End of .row -->
			</div>
			<!-- End of .container -->
		</div>
		<!-- End of .section-gap -->
		<section class="section-gap section-gap-top__with-text top-stories bg-grey-light-three">
			<div class="container">
				<div class="section-title m-b-xs-40">
					<h2 class="axil-title">Top Stories</h2>
					<a href="#" class="btn-link">All Top Stories</a>
				</div>
				<div class="row">
					<div class="col-lg-8">
						@if ($top_stories->first() != '')
							
						
						<div class="axil-img-container m-b-xs-30">
							<a href="post-format-standard.html" class="d-block">
								<img src="{{asset('public/images/posts/'.$top_stories->first()->images)}}" alt="gallery images"
									class="w-100">
								<div class="grad-overlay"></div>
							</a>
							<div class="media post-block position-absolute">
								<div class="media-body media-body__big">
									<div class="post-cat-group m-b-xs-10">
										<a href="{{ route('get_category_related_posts',
										$top_stories->first()->category->pluck('name')->first()) }}" class="post-cat cat-btn bg-color-purple-one">{{$top_stories->first()->category->pluck('name')->first()}}</a>
									</div>
									<div class="axil-media-bottom">
											
										<h3 class="axil-post-title hover-line hover-line"><a
												href="{{route('get_post',$top_stories->first()->slug)}}">{{$top_stories->first()->title}}</a></h3>
										<div class="post-metas">
											<ul class="list-inline">
												<li>By <a href="{{route('fetch_auther',$top_stories->first()->user->name)}}" class="post-author">{{uppercase($top_stories->first()->user->name)}}</a></li>
												<li><i class="dot">.</i>{{$top_stories->first()->created_at->toFormattedDateString()}}</li>
												<li><a href="#"><i class="feather icon-activity"></i>{{$top_stories->first()->views}} Views</a></li>
												<li><a href="#"><i class="feather icon-share-2"></i>230 Shares</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
						</div>
						<!-- End of .axil-img-container -->
				@endif
					</div>

					<!-- End of .grid-item -->
					<div class="col-lg-4">
						@if(isset($top_stories)&& $top_stories->count() > 0)
							@foreach ($top_stories as $key => $top_story)
								@if($key > 0)			
						<div class="axil-img-container m-b-xs-30">
							<a href="post-format-standard.html" class="d-block">
								<img src="{{asset('public/images/posts/'.$top_story->images)}}" alt="gallery images"
									{{-- class="w-100" --}} height="350px">
								<div class="grad-overlay"></div>
							</a>
							<div class="media post-block position-absolute">
								<div class="media-body">
									<div class="post-cat-group m-b-xs-10">
										<a href="{{ route('get_category_related_posts',$top_story->category->pluck('name')->first()) }}"
											class="post-cat cat-btn btn-mid bg-color-purple-two">{{$top_story->category->pluck('name')->first()}}</a>
									</div>
									<div class="axil-media-bottom">
										<h3 class="axil-post-title hover-line hover-line"><a
												href="{{route('get_post',$top_story->slug)}}">{{$top_story->title}}</a></h3>
										<div class="post-metas">
											<ul class="list-inline">
												<li><a href="{{route('fetch_auther',$top_story->user->name)}}"
														class="d-flex align-items-center"><span>By {{$top_story->user->name}}</span></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
						</div>
						<!-- End of .axil-img-container -->
							@endif
							@endforeach
						@else
						<h2 class="text-center">Waiting for Stories</h2>
						@endif
					</div>
					<!-- End of .col-lg-4 -->
				</div>
				<!-- End of .row -->
			</div>
			<!-- End of .container -->
		</section>
		<!-- End of .top-stories -->
		<section class="section-gap section-gap-top__with-text trending-stories">
			<div class="container">
				<div class="section-title m-b-xs-40">
					<h2 class="axil-title">Trending Stories</h2>
					<a href="#" class="btn-link">ALL TRENDING STORIES</a>
				</div>
				<div class="row">
					
						@if(isset($trending_stories) && $trending_stories->count() > 0)
								@foreach ($trending_stories as $td)
										
								<div class="col-lg-6">
						<div class="media post-block m-b-xs-30">
							<a href="post-format-standard.html" class="align-self-center"><img class=" m-r-xs-30"
									src="{{asset('public/images/posts/'.$td->images)}}" alt=""></a>
							<div class="media-body">
								<div class="post-cat-group m-b-xs-10">
									<a href="{{ route('get_category_related_posts',$td->category->pluck('name')->first()) }}" class="post-cat cat-btn bg-color-{{get_random_color()}}">{{$td->category->pluck('name')->first()}}</a>
								</div>
								<h3 class="axil-post-title hover-line hover-line"><a
										href="{{route('get_post',$td->slug)}}">{{$td->title}}</a></h3>
								<div class="post-metas">
									<ul class="list-inline">
										<li>By <a href="{{route('fetch_auther',$td->user->name)}}">{{$td->user->name}}</a></li>
									</ul>
								</div>
							</div>
						</div>
						<!-- End of .post-block -->
					</div>
					<!-- End of .col-lg-6 -->

					@endforeach

					@else
					<h2 class="text-center">Waiting for Stories</h2>
					@endif
						
					</div>
				</div>
				<!-- End of .row -->
			</div>
			<!-- End of .container -->
		</section>
		<!-- End of .trending-stories -->
		<section class="axil-video-posts section-gap section-gap-top__with-text bg-grey-dark-one">
			<div class="container">
				<div class="section-title title-white m-b-xs-40">
					<h2 class="axil-title">Videos</h2>
					<a href="#" class="btn-link ml-auto">All VIDEOS</a>
				</div>
				<!-- End of .section-title -->
				<div class="row">
					<div class="col-lg-8">
						<div class="axil-img-container flex-height-container">
							<a href="post-format-video.html" class="d-block h-100">
								<img src="{{asset('public/frontend/assets/images/video-post/video-post-latest.jpg')}}" alt="video post"
									class="w-100">
								<div class="grad-overlay grad-overlay__transparent"></div>
								<div class="video-popup video-play-btn video-play-btn__big"></div>
							</a>
							<div class="media post-block grad-overlay__transparent position-absolute m-b-xs-30">
								<div class="media-body media-body__big">
									<div class="axil-media-bottom mt-auto">
										<h3 class="axil-post-title hover-line hover-line"><a
												href="post-format-standard.html">Maui
												By Air The
												Best Way Around The
												Island</a></h3>
										<div class="post-metas">
											<ul class="list-inline">
												<li>By <a href="#" class="post-author">Ashley Graham</a></li>
												<li><i class="dot">.</i>July 23, 2019</li>
												<li><a href="#"><i class="feather icon-activity"></i>5k Views</a></li>
												<li><a href="#"><i class="feather icon-share-2"></i>230 Shares</a></li>
											</ul>
										</div>
									</div>
								</div>
								<!-- End of .media-body -->
							</div>
							<!-- End of .post-block -->
						</div>
						<!-- End of .axil-img-container -->
					</div>
					<!-- End of .col-lg-8 -->
					<div class="col-lg-4">
						<div class="axil-content">
							<div class="media post-block post-block__small post-block__on-dark-bg m-b-xs-30">
								<a href="post-format-video.html" class="align-self-center">
									<img class=" m-r-xs-30" src="{{asset('public/frontend/assets/images/video-post/video-post-1.jpg')}}" alt="">
									<span class="video-play-btn video-play-btn__small"></span>
								</a>
								<div class="media-body">
									<div class="post-cat-group">
										<a href="post-format-video.html" class="post-cat color-blue-three">BEAUTY</a>
									</div>
									<h3 class="axil-post-title hover-line hover-line"><a
											href="post-format-video.html">Stocking
											Your
											Restaurant Kitchen Finding
											Reliable
											Sellers</a></h3>
									<div class="post-metas">
										<ul class="list-inline">
											<li>By <a href="#">Amachea Jajah</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
							<div class="media post-block post-block__small post-block__on-dark-bg m-b-xs-30">
								<a href="post-format-video.html" class="align-self-center"><img class=" m-r-xs-30"
										src="{{asset('public/frontend/assets/images/video-post/video-post-2.jpg')}}" alt="">
									<span class="video-play-btn video-play-btn__small"></span></a>
								<div class="media-body">
									<a href="post-format-video.html" class="post-cat color-green-three">TRAVEL</a>
									<h3 class="axil-post-title hover-line hover-line"><a
											href="post-format-video.html">Trip To
											Iqaluit In
											Nunavut A Canadian
											Arctic
											City</a>
									</h3>
									<div class="post-metas">
										<ul class="list-inline">
											<li>By <a href="#">Xu Jianhong</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
							<div class="media post-block post-block__small post-block__on-dark-bg m-b-xs-30">
								<a href="post-format-video.html" class="align-self-center"><img class=" m-r-xs-30"
										src="{{asset('public/frontend/assets/images/video-post/video-post-3.jpg')}}" alt="">
									<span class="video-play-btn video-play-btn__small"></span></a>
								<div class="media-body">
									<a href="post-format-video.html" class="post-cat color-red-two">SPORTS</a>
									<h3 class="axil-post-title hover-line hover-line"><a
											href="post-format-video.html">Get The Boot A Birds Eye Look Into Mcse
											Boot Camps</a></h3>
									<div class="post-metas">
										<ul class="list-inline">
											<li>By <a href="#">Ahmad Nazeri</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
							<div class="media post-block post-block__small post-block__on-dark-bg m-b-xs-30">
								<a href="post-format-video.html" class="align-self-center"><img class=" m-r-xs-30"
										src="{{asset('public/frontend/assets/images/video-post/video-post-4.jpg')}}" alt="">
									<span class="video-play-btn video-play-btn__small"></span></a>
								<div class="media-body">
									<a href="post-format-video.html" class="post-cat color-blue-one">FASHION</a>
									<h3 class="axil-post-title hover-line hover-line"><a
											href="post-format-video.html">To Keep
											Makeup
											Looking Fresh Take A
											Powder</a></h3>
									<div class="post-metas">
										<ul class="list-inline">
											<li>By <a href="#">Sergio Pliego</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
						</div>
						<!-- End of .axil-content -->
					</div>
					<!-- End of .col-lg-4 -->
				</div>
				<!-- End of .row -->
			</div>
			<!-- End of .container -->
		</section>
		<!-- End of .axil-video-posts -->
		<div class="random-posts section-gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="add-container m-b-xs-60">
							<a href="#"><img src="{{asset('public/frontend/assets/images/clientbanner/clientbanner.jpg')}}" alt="add one"
									class="img-fluid"></a>
						</div>
						<main class="axil-content">

						@if (isset($rand_posts) && $rand_posts->count() > 0)
							@foreach ($rand_posts as $rd_post)
							
							
							<div class="media post-block post-block__mid m-b-xs-30">
								<a href="post-format-standard.html" class="align-self-center"><img class=""
								style="width:300px!important;" 
										src="{{asset('public/images/posts/'.$rd_post->images)}}" alt=""></a>
								<div class="media-body">
									<div class="post-cat-group m-b-xs-10">
										<a href="{{ route('get_category_related_posts',$rd_post->category->pluck('name')->first()) }}" class="post-cat cat-btn bg-color-{{get_random_color()}}">{{$rd_post->category->pluck('name')->first()}}</a>
									</div>
									<h3 class="axil-post-title hover-line hover-line"><a
											href="{{route('get_post',$rd_post->slug)}}">{{$rd_post->title}}</a></h3>
									<p class="mid">{!!str_limit($rd_post->body,30)!!}</p>
									<div class="post-metas">
										<ul class="list-inline">
											<li>By <a href="#">{{$rd_post->user->name}}</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
							@endforeach
							@else
							<h2 class="text-center">Waiting for stories</h2>	
						@endif
						</main>
						<!-- End of .axil-content -->
					</div>
					<!-- End of .col-lg-8 -->
					@include('frontend.partials.aside')
				</div>
				<!-- End of .row -->
			</div>
			<!-- End of .container -->
		</div>
		<!-- End of .random-posts -->
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
									<img src="{{asset('public/frontend/assets/images/related-post/related-post-2.jpg')}}" alt="abstruct image"
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
									<img src="{{asset('public/frontend/assets/images/related-post/related-post-2.jpg')}}" alt="abstruct image"
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
									<img src="{{asset('public/frontend/assets/images/related-post/related-post-2.jpg')}}" alt="abstruct image"
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
	
	<!-- Custom Script -->
	<script src="{{asset('public/frontend/assets/js/main.js')}}"></script>


	<script>
		
		
	</script>
	
		@endpush


		@endsection()
		