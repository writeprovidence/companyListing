@extends('layouts.app')
@section('content')
		<main id="main">
			<section class="hero-section" style="background-image: url('{{asset('images/bg2.jpg')}}');">
				<div class="container">
					<div class="row">
						<div class="col">
							<h1>#1 Web Hosting Directory & Reviews Platform</h1>
							<p>WH.TIPS (Web Hosting Tips) is the platform that helps its users in finding Best Web Hosting solution for their websites. We offer our recommendations by collecting reviews from users of the listed web hosting companies and based on the advices from our in house experts!</p>
							<div class="btn-wrap">
								<a class="btn btn-green" href="{{route('companies')}}" role="button">Browse Hosting Companies</a>
								<a class="btn btn-green" href="{{route('all.reviews')}}" role="button">Review Your Web Hosting</a>
							</div>
						</div>
						<div class="col">
							<div class="hero-card">
								<div class="image-wrap">
									<img src="images/ab.png" alt="image description" width="80" height="80">
								</div>
								<p>{{$company_count}} Listed Companies</p>
								<p>{{$review_count}}+ Real Reviews</p>
								<p>1 Million+ Reads & Shares</p>
							</div>
						</div>
					</div>
					<div class="hero-bottom">
						<div class="entry-header">
							<h3>Recommended Web Hosting Companies 2019</h3>
						</div>
						<div class="entry-body">
							<ul class="hosting-list">
								<li>
									<div class="hosting-card">
										<span class="cnt"></span>
										<div class="entry-image">
											<img src="images/bluehost.jpg" alt="bluehost">
										</div>
										<ul class="entry-links">
											<li><a href="#">Visit Site</a></li>
											<li><a href="#">Read Reviews</a></li>
										</ul>
									</div>
								</li>
								<li>
									<div class="hosting-card">
										<span class="cnt"></span>
										<div class="entry-image">
											<img src="images/bluehost.jpg" alt="bluehost">
										</div>
										<ul class="entry-links">
											<li><a href="#">Visit Site</a></li>
											<li><a href="#">Read Reviews</a></li>
										</ul>
									</div>
								</li>
								<li>
									<div class="hosting-card">
										<span class="cnt"></span>
										<div class="entry-image">
											<img src="images/bluehost.jpg" alt="bluehost">
										</div>
										<ul class="entry-links">
											<li><a href="#">Visit Site</a></li>
											<li><a href="#">Read Reviews</a></li>
										</ul>
									</div>
								</li>
								<li>
									<div class="hosting-card">
										<span class="cnt"></span>
										<div class="entry-image">
											<img src="images/bluehost.jpg" alt="bluehost">
										</div>
										<ul class="entry-links">
											<li><a href="#">Visit Site</a></li>
											<li><a href="#">Read Reviews</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<section class="section">
				<div class="container">
					<header class="section-header">
						<h1>Looking to buy Web Hosting?</h1>
						<p>We have collected the information from different Web Hosting companies to provide you information about the best detals available in the market.</p>
					</header>
					<div class="tab-block">
						<ul class="tabset">
							<li><a href="#tab1" class="active">Tab 1</a></li>
							<li><a href="#tab2">Tab 2</a></li>
							<li><a href="#tab3">Tab 3</a></li>
						</ul>
						<div class="tab-content">
							<div id="tab1">Tab 1 Content</div>
							<div id="tab2">Tab 2 Content</div>
							<div id="tab3">Tab 3 Content</div>
						</div>
					</div>
				</div>
			</section>
            @if($reviews->count() > 0)
			<section class="section bg-grey">
				<div class="container">
					<header class="section-header">
						<h1>Recent Reviews Posted</h1>
						<p>Real customer reviews, checked by our team before they are made public</p>
					</header>
					<ul class="reviewbox-list">
                        @foreach($reviews as $review)
                            <li>
                                <div class="reviewbox-card">
                                    <header class="entry-header">
                                        <span>Review by</span>
                                        <strong>{{$review->full_name}}</strong>
                                    </header>
                                    <div class="entry-rating">
                                        <div class="rating">
                                            <div class="raiting-wrap">
                                                    <span class="rating">
                                                        @for($i = 0; $i < $review->score; $i++)
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            @endfor
                                                    </span>
                                            </div>
                                            <span class="value">{{$review->score}}.00</span>
                                        </div>
                                        <time datetime="2019-02-11">{{$review->created_at->diffForHumans()}}</time>
                                    </div>
                                    <div class="entry-company">
                                        <span>About Company</span>
                                        <strong><a href="{{route('profile.company', $review->company->slug)}}">{{$review->company->name}}</a> <a href="{{route('profile.company', $review->company->slug)}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a></strong>
                                    </div>
                                    <div class="entry-body">
                                        <h3><a>{{$review->title}}</a></h3>
                                        <p>
                                            {{$review->review}}
                                        </p>
                                        <div class="links">
                                            <a href="{{route('redirect.company', $review->company->slug)}}">Visit Site</a> |
                                            <a href="{{route('reviews.company', $review->company->slug)}}">Read Reviews</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
					</ul>
					<div class="entry-button">
                        <a class="btn btn-green" href="{{route('all.reviews')}}" role="button">Browse All Reviews</a>
					</div>
				</div>
			</section>
            @endif
			<section class="section">
				<div class="container">
					<ul class="info-list">
						<li>
							<div class="info-card">
								<h3>Make yourself heard loud!</h3>
								<div class="img-wrap">
									<img src="images/review-icon.png" alt="image description" width="200" height="47">
								</div>
								<p>Drop your experience with Web Hosting Companies and give everyone chance to understand.very review you post help other readers to assess the Web Hosting Companies!</p>
								<a class="btn btn-green" href="#" role="button">Learn how to post review</a>
							</div>
						</li>
						<li>
							<div class="info-card">
								<h3>Make yourself heard loud!</h3>
								<div class="img-wrap">
									<img src="images/review-icon.png" alt="image description" width="200" height="47">
								</div>
								<p>Drop your experience with Web Hosting Companies and give everyone chance to understand.very review you post help other readers to assess the Web Hosting Companies!</p>
								<a class="btn btn-green" href="#" role="button">Learn how to post review</a>
							</div>
						</li>
						<li>
							<div class="info-card">
								<h3>Make yourself heard loud!</h3>
								<div class="img-wrap">
									<img src="images/review-icon.png" alt="image description" width="200" height="47">
								</div>
								<p>Drop your experience with Web Hosting Companies and give everyone chance to understand.very review you post help other readers to assess the Web Hosting Companies!</p>
								<a class="btn btn-green" href="#" role="button">Learn how to post review</a>
							</div>
						</li>
					</ul>
				</div>
			</section>
		</main>
@endsection
