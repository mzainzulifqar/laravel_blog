<div class="col-lg-4">
						<aside class="post-sidebar">
							<div class="add-block-widget m-b-xs-40">
								<a href="#"><img src="{{asset('public/frontend/assets/images/clientbanner/clientbanner2.jpg')}}" alt="sidebar add"
										class="img-fluid"></a>
							</div>
							<div class="newsletter-widget weekly-newsletter bg-grey-light-three m-b-xs-40">
								<div class="newsletter-content">
									<div class="newsletter-icon">
										<i class="feather icon-send"></i>
									</div>
									<div class="section-title">
										<h3 class="axil-title">Subscribe To Our Weekly
											Newsletter</h3>
										<p class="mid m-t-xs-10 m-b-xs-20">No spam, notifications only about new
											products,
											updates.</p>
									</div>
									<!-- End of .section-title -->
									<div class="subscription-form-wrapper">
									<form method="post" class="subscription-form" id="subscriber-form2">
									@csrf
									
									<div class="form-group form-group-small m-b-xs-20">
										<label for="subscription-email">Enter Email Address</label>
										<input type="text" name="subscriber_email" id="subscription-email2">
										<span id="sub_error2" style="color:red"></span>
										<span id="sub_success2" style="color:green"></span>
									</div>
									<div class="m-b-xs-0">
										<input id="add_sub2" type="submit" value="Subscribe" class="btn btn-primary btn-block">
									</div>
								</form>
										<!-- End of .subscription-form -->
									</div>
									<!-- End of .subscription-form-wrapper -->
								</div>
								<!-- End of .newsletter-content -->
							</div>
							<!-- End of  .newsletter-widget -->
							<div class="category-widget m-b-xs-40">
								<div class="widget-title">
									<h3>Categories</h3>
									<div class="owl-nav">
										<button class="custom-owl-prev"><i
												class="feather icon-chevron-left"></i></button>
										<button class="custom-owl-next"><i
												class="feather icon-chevron-right"></i></button>
									</div>
								</div>
								<div class="category-carousel">
									<div class="owl-carousel owl-theme" data-owl-items="1" data-owl-loop="true"
										data-owl-autoplay="true" data-owl-dots="false" data-owl-nav="false"
										data-owl-margin="10">
										<div class="cat-carousel-inner">
											<ul class="category-list-wrapper">
											
												@if (isset($category_all) && $category_all->count() > 0)
													@foreach($category_all as $category)

													
												<li class="category-list perfect-square">
													<a href="#" class="list-inner"
														style="background-image: url({{asset('public/images/category/'.$category->image)}})">
														<div class="post-info-wrapper overlay">
															<div class="counter-inner"><span class="counter">{{$category->category_post->count() > 0 ? thousandsCurrencyFormat($category->category_post->count()) : 0}}</span>
															</div>
															<h4 class="cat-title">Top Stories</h4>
														</div>
														<!-- End of .counter-wrapper -->
													</a>
												</li>
												<!-- End of .category-list -->
												@endforeach()
												@endif
											</ul>
											<!-- End of .category-list-wrapper -->
										</div>
										<!-- End of .cat-carousel-inner -->
									</div>
									<!-- End of  .owl-carousel -->
								</div>
								<!-- End of .category-carousel -->
							</div>
							<!-- End of .category-widget -->
							<div class="sidebar-social-share-widget m-b-xs-40">
								<ul class="social-share-list-wrapper">
									<li class="social-share-list text-center perfect-square">
										<a href="#" class="list-inner bg-color-facebook">
											<i class="fab fa-facebook-f"></i>
											<div class="counts">2000+</div>
											<div class="title">Fans</div>
										</a>
									</li>
									<!-- End of .social-share-list -->
									<li class="social-share-list text-center perfect-square">
										<a href="#" class="list-inner bg-color-twitter">
											<i class="fab fa-twitter"></i>
											<div class="counts">4000+</div>
											<div class="title">Followers</div>
										</a>
									</li>
									<!-- End of .social-share-list -->
									<li class="social-share-list text-center perfect-square">
										<a href="#" class="list-inner bg-color-youtube">
											<i class="fab fa-youtube"></i>
											<div class="counts">1M+</div>
											<div class="title">Subscribers</div>
										</a>
									</li>
									<!-- End of .social-share-list -->
									<li class="social-share-list text-center perfect-square">
										<a href="#" class="list-inner bg-color-linkedin">
											<i class="fab fa-linkedin-in"></i>
											<div class="counts">600+</div>
											<div class="title">Connections</div>
										</a>
									</li>
									<!-- End of .social-share-list -->
									<li class="social-share-list text-center perfect-square">
										<a href="#" class="list-inner bg-color-vimeo">
											<i class="fab fa-vimeo"></i>
											<div class="counts">500+</div>
											<div class="title">Connections</div>
										</a>
									</li>
									<!-- End of .social-share-list -->
									<li class="social-share-list text-center perfect-square">
										<a href="#" class="list-inner bg-color-pinterest">
											<i class="fab fa-pinterest"></i>
											<div class="counts">600+</div>
											<div class="title">Followers</div>
										</a>
									</li>
									<!-- End of .social-share-list -->
									<li class="social-share-list text-center perfect-square">
										<a href="#" class="list-inner bg-color-twitch">
											<i class="fab fa-twitch"></i>
											<div class="counts">1K+</div>
											<div class="title">Followers</div>
										</a>
									</li>
									<!-- End of .social-share-list -->
									<li class="social-share-list text-center perfect-square">
										<a href="#" class="list-inner bg-color-instagram">
											<i class="fab fa-instagram"></i>
											<div class="counts">1K+</div>
											<div class="title">Followers</div>
										</a>
									</li>
									<!-- End of .social-share-list -->
								</ul>
								<!-- End of .social-share-list-wrapper -->
							</div>
							<!-- End of .sidebar-social-share -->
							<div class="post-widget sidebar-post-widget m-b-xs-40">
								<ul class="nav nav-pills row no-gutters">
									<li class="nav-item col">
										<a class="nav-link active" data-toggle="pill" href="#recent-post">Recent</a>
									</li>
									<li class="nav-item col">
										<a class="nav-link" data-toggle="pill" href="#popular-post">Popular</a>
									</li>
									
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="recent-post">
										<div class="axil-content">
											@if (isset($posts) && $posts->count() > 0)
												@foreach ($posts as $pp)

											<div class="media post-block post-block__small">
												<a href="post-format-standard.html" class="align-self-center"><img
														class=" m-r-xs-30" src="{{asset('public/images/posts/'.$pp->images)}}"
														alt="media image"></a>
												<div class="media-body">
													<div class="post-cat-group">
														@foreach ($pp->category as $p_c)
															
														
														<a href="post-format-standard.html"
															class="post-cat color-{{get_random_color()}}">{{$p_c->name}}</a>
														@endforeach
													</div>
													<h4 class="axil-post-title hover-line hover-line"><a
															href="{{route('get_post',$pp->slug)}}">{{$pp->title}}</a></h4>
													<div class="post-metas">
														<ul class="list-inline">
															<li>By <a href="{{route('fetch_auther',$pp->user->name)}}">{{$pp->user->name}}</a></li>
														</ul>
													</div>
												</div>
											</div>
											<!-- End of .post-block -->
											@endforeach()
											@endif
											
										</div>
										<!-- End of .content -->
									</div>
									<!-- End of .tab-pane -->
									<div class="tab-pane fade" id="popular-post">
										<div class="axil-content">
											{{-- {{dd($top_stories)}} --}}
											@if (isset($top_stories) && $top_stories->count() > 0)
												@foreach ($top_stories as $popular)
													
											
											<div class="media post-block post-block__small">
												<a href="post-format-standard.html" class="align-self-center"><img
														class=" m-r-xs-30" src="{{asset('public/images/posts/'.$popular->images)}}"
														alt="media image"></a>
												<div class="media-body">
													<a href="post-format-standard.html"
														class="post-cat color-{{get_random_color()}}">{{$popular->category->pluck('name')->first()}}</a>
													<h4 class="axil-post-title hover-line hover-line"><a
															href="{{route('get_post',$popular->slug)}}">{{str_limit($popular->title),20}}....</a></h4>
													<div class="post-metas">
														<ul class="list-inline">
															<li>By <a href="{{route('fetch_auther',$popular->user->name)}}">{{uppercase($popular->user->name)}}</a></li>
														</ul>
													</div>
												</div>
											</div>
											<!-- End of .post-block -->
												@endforeach
											@endif
											
										</div>
										<!-- End of .content -->
									</div>
									<!-- End of .tab-pane -->
									
								</div>
								<!-- End of .tab-content -->
							</div>
							<!-- End of .sidebar-post-widget -->


							<div class="tag-widget m-b-xs-30">
								<div class="widget-title">
									<h3>Tags</h3>
								</div>
								<div class="axil-content">
									<ul class="tag-list-wrapper">

										@if (isset($tags) && $tags->count() > 0)
											@foreach($tags->all() as $tag)

											<li><a href="{{route('get_tags_related_posts',['tag' => $tag->name])}}">{{$tag->name}}</a></li>

											@endforeach()
										@endif
									
									</ul>
									<!-- End of .tab-list-wrapper -->
								</div>
								<!-- End of .content -->
							</div>
							<!-- End of .tag-widget -->

							<div class="instagram-widget m-b-xs-40">
								<div class="widget-title">
									<h3>Instagram</h3>
								</div>
								<div class="axil-content">
									<ul class="instagram-post-list-wrapper">
										<li class="instagram-post-list perfect-square">
											<a href="#" class="list-inner"
												style="background-image: url({{asset('public/frontend/assets/images/instagram-post/instagram-post-1.jpg)')}}">
												<div class="post-info-wrapper overlay">
													<div class="post-info">
														<i class="feather icon-heart"></i>
														20K+
													</div>
													<!-- End of .post-info -->
													<div class="post-info">
														<i class="feather icon-message-square"></i>
														200+
													</div>
													<!-- End of .post-info -->
												</div>
												<!-- End of .post-info-wrapper overlay -->
											</a>
										</li>
										<!-- End of .instagram-post-list -->
										<li class="instagram-post-list perfect-square">
											<a href="#" class="list-inner"
												style="background-image: url({{asset('public/frontend/assets/images/instagram-post/instagram-post-2.jpg)')}}">
												<div class="post-info-wrapper overlay">
													<div class="post-info">
														<i class="feather icon-heart"></i>
														20K+
													</div>
													<!-- End of .post-info -->
													<div class="post-info">
														<i class="feather icon-message-square"></i>
														200+
													</div>
													<!-- End of .post-info -->
												</div>
												<!-- End of .post-info-wrapper overlay -->
											</a>
										</li>
										<!-- End of .instagram-post-list -->
										<li class="instagram-post-list perfect-square">
											<a href="#" class="list-inner"
												style="background-image: url({{asset('public/frontend/assets/images/instagram-post/instagram-post-3.jpg)')}}">
												<div class="post-info-wrapper overlay">
													<div class="post-info">
														<i class="feather icon-heart"></i>
														20K+
													</div>
													<!-- End of .post-info -->
													<div class="post-info">
														<i class="feather icon-message-square"></i>
														200+
													</div>
													<!-- End of .post-info -->
												</div>
												<!-- End of .post-info-wrapper overlay -->
											</a>
										</li>
										<!-- End of .instagram-post-list -->
										<li class="instagram-post-list perfect-square">
											<a href="#" class="list-inner"
												style="background-image: url({{asset('public/frontend/assets/images/instagram-post/instagram-post-4.jpg)')}}">
												<div class="post-info-wrapper overlay">
													<div class="post-info">
														<i class="feather icon-heart"></i>
														20K+
													</div>
													<!-- End of .post-info -->
													<div class="post-info">
														<i class="feather icon-message-square"></i>
														200+
													</div>
													<!-- End of .post-info -->
												</div>
												<!-- End of .post-info-wrapper overlay -->
											</a>
										</li>
										<!-- End of .instagram-post-list -->
										<li class="instagram-post-list perfect-square">
											<a href="#" class="list-inner"
												style="background-image: url({{asset('public/frontend/assets/images/instagram-post/instagram-post-4.jpg)')}}">
												<div class="post-info-wrapper overlay">
													<div class="post-info">
														<i class="feather icon-heart"></i>
														20K+
													</div>
													<!-- End of .post-info -->
													<div class="post-info">
														<i class="feather icon-message-square"></i>
														200+
													</div>
													<!-- End of .post-info -->
												</div>
												<!-- End of .post-info-wrapper overlay -->
											</a>
										</li>
										<!-- End of .instagram-post-list -->
										<li class="instagram-post-list perfect-square">
											<a href="#" class="list-inner"
												style="background-image: url({{asset('public/frontend/assets/images/instagram-post/instagram-post-4.jpg)')}}">
												<div class="post-info-wrapper overlay">
													<div class="post-info">
														<i class="feather icon-heart"></i>
														20K+
													</div>
													<!-- End of .post-info -->
													<div class="post-info">
														<i class="feather icon-message-square"></i>
														200+
													</div>
													<!-- End of .post-info -->
												</div>
												<!-- End of .post-info-wrapper overlay -->
											</a>
										</li>
										<!-- End of .instagram-post-list -->
									</ul>
									<!-- End of .instagram-post-list-wrapper -->
									<div class="m-t-xs-20">
										<button class="btn btn-primary btn-small">FOLLOW US</button>
									</div>
								</div>
								<!-- End of .content -->
							</div>
							<!-- End of .instagram-widget -->
						{{-- 	<div class="add-block-widget m-b-xs-40">
								<a href="#"><img src="{{asset('public/frontend/assets/images/sidebar-add.jpg')}}" alt="sidebar add"
										class="img-fluid"></a>
							</div> --}}
						</aside>
						<!-- End of .post-sidebar -->
					</div>
					<!-- End of .col-lg-4 -->



