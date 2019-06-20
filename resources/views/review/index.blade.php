@extends('layouts.app')
@section('content')
		<main id="main">
			<section class="hero-section page-mod" style="background-image: url('{{asset('images/bg2.jpg')}}');">
				<div class="container">
					<h1>Web Hosting Reviews</h1>
					<p>Unlike other sites, we don't fake hosting reviews, forge ratings or hide anything. Since 2004, we strive to become the most trusted hosting review source delivering all your feedback, both positive and negative. Browse through 19711 reviews by real verified customers or submit your own.</p>
				</div>
			</section>
			<div class="top-layout">
				<div class="container">
					<aside class="top-entry-aside">

                        <form id="order-result" action="{{route('order.reviews')}}" method="POST" class="advanced-form">
                            @csrf
							<h5 class="aside-title">Advanced Search</h5>
							<div class="form-row open-close">
                                <select name="order" onchange="event.preventDefault();
                                    document.getElementById('order-result').submit(); ">
									<option value="desc">Newest First</option>
									<option value="asc">Oldest First</option>
								</select>
							</div>

                        </form>
                        <form id="order-results" action="{{route('order.reviews')}}" method="POST" class="advanced-form">
                            @include('includes.starFilter')
                        </form>
					</aside>
					<div class="top-entry-body">
						<ul class="review-list commentr-mod">
                            @foreach($reviews as $review)
                                <li>
                                    <div class="review-card">
                                        <div class="entry-header">
                                            <span>Review by</span>
                                            <strong>{{$review->full_name}}</strong>
                                            <div class="score">Review Score: {{$review->score}}</div>
                                        </div>
                                        <div class="entry-body">
                                            <div class="date-wrap">
                                                <time datetime="2019-12-04">{{$review->created_at->diffForHumans()}}</time>
                                            </div>
                                            <div class="text">
                                                <h3><a href="{{route('show.review', [$review->company->slug, $review->slug])}}">{{$review->title}}</a></h3>
                                                <p>
                                                    {{$review->review}}
                                                </p>
                                            </div>
                                           <ul class="value-list">
                                                <li>
                                                    <span>Reliability</span>
                                                    <span class="rating">
                                                        @for($i = 1; $i < 6; $i++) <i class="fa {{$i <= $review->reliability ? 'fa-star' : 'fa-star-o'}}"
                                                            aria-hidden="true"></i>
                                                            @endfor
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>Pricing</span>
                                                    <span class="rating">
                                                        @for($i = 1; $i < 6; $i++) <i class="fa {{$i <= $review->pricing ? 'fa-star' : 'fa-star-o'}}"
                                                            aria-hidden="true"></i>
                                                            @endfor
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>User Friendly</span>
                                                    <span class="rating">
                                                        @for($i = 1; $i < 6; $i++) <i class="fa {{$i <= $review->user_friendly ? 'fa-star' : 'fa-star-o'}}"
                                                            aria-hidden="true"></i>
                                                            @endfor
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>Support</span>
                                                    <span class="rating">
                                                        @for($i = 1; $i < 6; $i++) <i class="fa {{$i <= $review->support ? 'fa-star' : 'fa-star-o'}}"
                                                            aria-hidden="true"></i>
                                                            @endfor
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>Features</span>
                                                    <span class="rating">
                                                        @for($i = 1; $i < 6; $i++) <i class="fa {{$i <= $review->features ? 'fa-star' : 'fa-star-o'}}"
                                                            aria-hidden="true">
                                                            </i>
                                                            @endfor
                                                    </span>
                                                </li>
                                            </ul>

                                        </div>
                                        <div class="entry-company">
                                            <div>
                                                <span class="label">Company</span>
                                                <strong>
                                                    <a href="{{route('profile.company', $review->company->slug)}}">{{$review->company->name}}</a>
                                                    <a href="{{route('profile.company', $review->company->slug)}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                                                </strong>
                                            </div>
                                            <div>
                                                <ul class="data-review-list">
                                                    <li>
                                                        <span class="heading">Company Rating</span>
                                                        <span class="value">{{$review->company->rating}}</span>
                                                    </li>
                                                    <li>
                                                        <span class="heading">Total Reviews</span>
                                                        <span class="value">{{$review->company->approvedreviewscount}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @if($review->hasResponse())
                                        <div class="entry-response">
                                            <h6>Response</h6>
                                            <p>
                                                {{$review->response}}
                                            </p>
                                        </div>
                                        @endif
                                        <div class="entry-footer">
                                            <div class="share-popup popup-holder">
                                                <a class="open rewiew-btn grey-mod" href="#"><i class="fa fa-share-alt"></i>
                                                    <span>Share</span>
                                                    <div class="popup">
                                                        <ul>
                                                            <li>
                                                                <button class="share-btn copy" type="button" aria-link="{{route('show.review', [$review->company->slug, $review->slug])}}">
                                                                    <i class="fa fa-link" aria-hidden="true"></i>
                                                                    <span class="copy-text">Copy Link</span>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button class="share-btn twitter" type="button" aria-link="{{route('show.review', [$review->company->slug, $review->slug])}}">
                                                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                                                    <span>Twitter</span>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button class="share-btn facebook" type="submit" aria-link="{{route('show.review', [$review->company->slug, $review->slug])}}">
                                                                    <i class="fa fa-facebook" aria-hidden="true" ></i>
                                                                    <span>Facebook</span>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div>
                                               <span class="entry-text">Is this review helpful to you?</span>
                                                <a class="rewiew-btn feedback" data-value="yes" data-id="{{$review->company->slug}}" data-review="{{$review->slug}}" href="#"><i class="fa fa-thumbs-up"></i> Yes</a>
                                                <a class="rewiew-btn feedback" data-value="no" data-id="{{$review->company->slug}}" data-review="{{$review->slug}}" href="#"><i class="fa fa-thumbs-down"></i> No</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
						</ul>
						<nav class="pagination-block">
							<ul class="pagination">
								{{$reviews->links('pagination.default')}}
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</main>
@endsection
