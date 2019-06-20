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
                    @if($featured_companies->count() > 0)
                        <div class="hero-bottom">
                            <div class="entry-header">
                                <h3>Recommended Web Hosting Companies 2019</h3>
                            </div>
                            <div class="entry-body">
                                <ul class="hosting-list">
                                    @foreach($featured_companies as $company)
                                        <li>
                                            <div class="hosting-card">
                                                <span class="cnt"></span>
                                                <div class="entry-image">
                                                    <p>{{$company->name}}</p>
                                                </div>
                                                <ul class="entry-links">
                                                    <li><a href="{{route('redirect.company', $company->slug)}}" target="_blank">Visit Site</a></li>
                                                    <li><a href="{{route('profile.company', $company->slug)}}">Read Reviews</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
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
            @if($featured_reviews->count() > 0)
			<section class="section bg-grey">
				<div class="container">
					<header class="section-header">
						<h1>Recent Reviews Posted</h1>
						<p>Real customer reviews, checked by our team before they are made public</p>
                    </header>
                    @if($featured_reviews->count() > 0)
                        <ul class="reviewbox-list">
                            @foreach($featured_reviews as $review)
                                <li>
                                    <div class="reviewbox-card">
                                        <header class="entry-header">
                                            <span>Review by</span>
                                            <strong>{{$review->full_name}}</strong>
                                        </header>
                                        <div class="entry-rating">
                                            <div class="rating">
                                                <div class="raiting-wrap">
                                                    <svg class="star-full" width="2560" height="512" viewBox="0 0 2560 512" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <clipPath id="r1">
                                                            <path
                                                                d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z"
                                                                fill="black"></path>
                                                            <path
                                                                d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z"
                                                                fill="black"></path>
                                                            <path
                                                                d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z"
                                                                fill="black"></path>
                                                            <path
                                                                d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z"
                                                                fill="black"></path>
                                                            <path
                                                                d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z"
                                                                fill="black"></path>
                                                        </clipPath>
                                                        <g clip-path="url('#r1')">
                                                            <rect fill="#fbaf40" class="r1" x="0" y="0" width="{{$review->score * 10}}%" height="100%">
                                                            </rect>
                                                        </g>
                                                    </svg>
                                                    <svg class="star-empty" width="2560" height="512" viewBox="0 0 2560 512" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z"
                                                            fill="#e2d7d7"></path>
                                                        <path
                                                            d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z"
                                                            fill="#e2d7d7"></path>
                                                        <path
                                                            d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z"
                                                            fill="#e2d7d7"></path>
                                                        <path
                                                            d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z"
                                                            fill="#e2d7d7"></path>
                                                        <path
                                                            d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z"
                                                            fill="#e2d7d7"></path>
                                                    </svg>
                                                </div>
                                                <span class="value">{{$review->score}}</span>
                                            </div>

                                            <time datetime="2019-02-11">{{$review->created_at->diffForHumans()}}</time>
                                        </div>
                                        <div class="entry-company">
                                            <span>About Company</span>
                                            {{-- <strong><a href="{{route('profile.company', $review->company->slug)}}">{{$review->company->name}}</a> <a href="{{route('profile.company', $review->company->slug)}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a></strong> --}}
                                        </div>
                                        <div class="entry-body">
                                            <h3><a>{{$review->title}}</a></h3>
                                            <p>
                                                {{$review->review}}
                                            </p>
                                            <div class="links">
                                                <a target="_blank" href="{{route('redirect.company', $review->company->slug)}}">Visit Site</a> |
                                                <a href="{{route('profile.company', $review->company->slug)}}">Read Reviews</a>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="entry-button">
                            <a class="btn btn-green" href="{{route('all.reviews')}}" role="button">Browse All Reviews</a>
                        </div>
                    @endif
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
