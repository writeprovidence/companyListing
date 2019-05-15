@extends('layouts.app')
@section('content')
		<main id="main">
			<section class="hero-section page-mod" style="background-image: url('images/bg2.jpg');">
				<div class="container">
					<h1>Web Hosting Reviews</h1>
					<p>Unlike other sites, we don't fake hosting reviews, forge ratings or hide anything. Since 2004, we strive to become the most trusted hosting review source delivering all your feedback, both positive and negative. Browse through 19711 reviews by real verified customers or submit your own.</p>
				</div>
			</section>
			<div class="top-layout">
				<div class="container">
					<aside class="top-entry-aside">
						<form action="#" class="advanced-form">
							<h5 class="aside-title">Advanced Search</h5>
							<div class="form-row open-close">
								<select>
									<option>Newest First</option>
									<option>Oldest First</option>
								</select>
							</div>
							<div class="form-row open-close">
								<h5><a class="opener" href="#">Customer Feedbacks <i class="fa fa-angle-left" aria-hidden="true"></i></a></h5>
								<div class="slide">
									<div class="custom-checkbox has-stars">
										<input type="checkbox" id="stars5">
											<label for="stars5">
												<span>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
												</span>
												<span>5 Stars</span>
										</label>
									</div>
									<div class="custom-checkbox has-stars">
										<input type="checkbox" id="stars3-4">
											<label for="stars3-4">
												<span>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
												</span>
												<span>3-4 Stars</span>
										</label>
									</div>
									<div class="custom-checkbox has-stars">
										<input type="checkbox" id="stars1-2">
											<label for="stars1-2">
												<span>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
												</span>
												<span>1-2 Stars</span>
										</label>
									</div>
									<div class="custom-checkbox has-stars">
										<input type="checkbox" id="no-stars">
											<label for="no-stars">
												<span>
													<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
												</span>
												<span>No Stars</span>
										</label>
									</div>
								</div>
							</div>
						</form>
					</aside>
					<div class="top-entry-body">
						<h3 class="top-heading">Customer Reviews</h3>
						<ul class="review-list commentr-mod">
                            @foreach($reviews as $review)
                                <li>
                                    <div class="review-card">
                                        <div class="entry-header">
                                            <span>Review by</span>
                                            <strong>{{$review->full_name}}</strong>
                                            <div class="score">Review Score: 9.2</div>
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
                                                    <span>User-friendliness</span>
                                                    <span class="rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>User-friendliness</span>
                                                    <span class="rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>User-friendliness</span>
                                                    <span class="rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>User-friendliness</span>
                                                    <span class="rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>User-friendliness</span>
                                                    <span class="rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
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
                                                        <span class="value">7.4</span>
                                                    </li>
                                                    <li>
                                                        <span class="heading">Total Reviews</span>
                                                        <span class="value">{{$review->company->reviews()->count()}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="entry-response">
                                            <h6>Response</h6>
                                            <p>
                                                {{$review->response}}
                                            </p>
                                        </div>
                                        <div class="entry-footer">
                                            <div class="share-popup popup-holder">
                                                <a class="open rewiew-btn grey-mod" href="#"><i class="fa fa-share-alt"></i>
                                                    <span>Share</span>
                                                    <div class="popup">
                                                        <ul>
                                                            <li>
                                                                <button class="share-btn " type="button">
                                                                    <i class="fa fa-link" aria-hidden="true"></i>
                                                                    <span>Copy Link</span>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button class="share-btn twitter" type="button">
                                                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                                                    <span>Twitter</span>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button class="share-btn facebook" type="button">
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
                                                <a class="rewiew-btn" data-value="yes" data-id="{{$review->company->slug}}" href="#"><i class="fa fa-thumbs-up"></i> yes</a>
                                                <a class="rewiew-btn" data-value="no" data-id="{{$review->company->slug}}" href="#"><i class="fa fa-thumbs-down"></i> no</a>
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
