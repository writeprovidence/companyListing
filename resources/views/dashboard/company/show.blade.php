@extends('layouts.app')
@section('content')
		<main id="main">

            @include('includes.reviewheader')

			<section class="details-section">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="filter-block">
								<h3>{{$company->name}}'s Customer Reviews</h3>
								<form id="order-result" action="{{route('order.profile.company', $company->slug)}}" method="POST">
                                    @csrf
                                    <div class="form-row open-close">
                                        <select class="filter-select" name="order" onchange="event.preventDefault();
                                                                                        document.getElementById('order-result').submit(); ">
                                            <option value="desc">Newest First</option>
                                            <option value="asc">Oldest First</option>
                                        </select>
                                    </div>

                                </form>
							</div>
							<ul class="review-list">
                                @foreach($reviews as $review)
                                    <li>
                                        <div class="review-card">
                                            <div class="entry-header">
                                                <span>Review by</span>
                                                <strong>{{$review->full_name}} </strong>
                                                <div class="score">Overall Score: {{$review->score}}</div>
                                            </div>
                                            <div class="entry-body">
                                                <div class="date-wrap">
                                                    <time datetime="2019-12-04">{{$review->created_at->diffForHUmans()}}</time>
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
                                                            @for($i = 1; $i < 6; $i++)
                                                                <i class="fa {{$i <= $review->reliability ? 'fa-star' : 'fa-star-o'}}" aria-hidden="true"></i>
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
                                                            @for($i = 1; $i < 6; $i++) <i class="fa {{$i <= $review->features ? 'fa-star' : 'fa-star-o'}}" aria-hidden="true">
                                                                </i>
                                                                @endfor
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            @if($review->hasResponse())
                                            <div class="entry-response">
                                                <h6>{{$review->company->name}}'s Response</h6>
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
                                                                    <button class="share-btn copy" type="button"
                                                                        aria-link="{{route('show.review', [$review->company->slug, $review->slug])}}">
                                                                        <i class="fa fa-link" aria-hidden="true"></i>
                                                                        <span class="copy-text">Copy Link</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="share-btn twitter" type="button"
                                                                        aria-link="{{route('show.review', [$review->company->slug, $review->slug])}}">
                                                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                                                        <span>Twitter</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="share-btn facebook" type="submit"
                                                                        aria-link="{{route('show.review', [$review->company->slug, $review->slug])}}">
                                                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                                                        <span>Facebook</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </a>
                                                </div>
                                               <div>
                                                    <span class="entry-text">Is this review helpful to you?</span>
                                                    <a class="rewiew-btn feedback" data-value="yes" data-id="{{$review->company->slug}}" data-review="{{$review->slug}}" href="#"><i
                                                            class="fa fa-thumbs-up"></i> Yes</a>
                                                    <a class="rewiew-btn feedback" data-value="no" data-id="{{$review->company->slug}}" data-review="{{$review->slug}}" href="#"><i
                                                            class="fa fa-thumbs-down"></i> No</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
							</ul>
							<nav class="pagination-block">
								{{$reviews->links('pagination.default')}}
							</nav>
						</div>
						<div class="col">
							<aside id="sidebar-right">
								<div class="widget">
									<h3>Website thumbnail</h3>
									<div>
										<img src="{{asset('images/companies/' .$company->avatar)}}" alt="image description" style="max-width:200px; max-height:200px">
									</div>
								</div>
								<div class="widget">
									<h3>Company details</h3>
									<dl class="details-list">
										<div>
											<dt>Email address:</dt>
											<dd><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:{{$company->email}}">{{$company->email}}</a></dd>
										</div>
										<div>
											<dt>Phone number:</dt>
											<dd><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:{{$company->phone}}">{{$company->phone}}</a> ext</dd>
										</div>
										<div>
											<dt>Website:</dt>
											<dd><i class="fa fa-link" aria-hidden="true"></i> <a href="{{route('redirect.company', $company->slug)}}" target="_blank">{{$company->website}}</a></dd>
										</div>
									</dl>
								</div>
							</aside>
						</div>
					</div>
				</div>
            </section>
            <section class="about-section section bg-grey text-center">
                <div class="container">
                    <header class="section-header">
                        <h1>About {{$company->name}}</h1>
                    </header>
                    <p>
                        {{$company->description}}
                    </p>
                    <div>
                        <a class="btn btn-green" href="{{route('redirect.company', $company->slug)}}">Visit Website</a>
                    </div>
                </div>
            </section>
            <section class="section text-center">
                <div class="container">
                    <header class="section-header">
                        <h1>Global Top Web Hosting Companies</h1>
                    </header>
                    <ul class="hosting-list">
                        <li>
                            <div class="hosting-card">
                                <span class="cnt"></span>
                                <div class="entry-image">
                                    <img src="{{asset('images/bluehost.jpg')}}" alt="bluehost">
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
                                    <img src="{{asset('images/bluehost.jpg')}}" alt="bluehost">
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
                                    <img src="{{asset('images/bluehost.jpg')}}" alt="bluehost">
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
                                    <img src="{{asset('images/bluehost.jpg')}}" alt="bluehost">
                                </div>
                                <ul class="entry-links">
                                    <li><a href="#">Visit Site</a></li>
                                    <li><a href="#">Read Reviews</a></li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </section>
		</main>
@endsection
