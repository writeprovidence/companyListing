@extends('layouts.app')
@section('content')
		<main id="main">
			<div class="dashboard-block">
				<div class="container">
					<div class="dashboard-wrap">

                    @include('includes.reviewAside')

						<div class="dashboard-body">
							<ul class="review-list commentr-mod">
                                @foreach($reviews as $review)
								<li>
									<div class="review-card">
										<div class="entry-header">
                                            <span>Review by</span>
                                            <strong>{{$review->full_name}}</strong>
                                            <div class="score">Overall Score: 9.2</div>
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
											<div>
												<span class="statistics-comp">
													<span>{{$review->likes}} Likes</span>
													<span>{{$review->dislikes}} Dislikes</span>
												</span>
											</div>
											<div>
                                                @if($review->response != $review->defaultReponse())
                                                    <a class="rewiew-btn disable" href="#">Response Locked</a>
                                                @else
                                                    <a class="rewiew-btn reply-review" href="#">Reply</a>
                                                @endif
											</div>
										</div>
                                    </div>

									<div class="review-comment comment-box">
										<div class="enter-form login-form">
											<form action="{{route('store.reviewresponse', $review->slug)}}" method="POST" class="dashboard-form">
                                                @csrf
                                                <div class="form-row">
                                                    <textarea id="review_response" name="review_response">{{ old('review_response') }}</textarea>
                                                </div>
                                                <hr>
                                                <div class="bottom-row">
                                                    <button class="btn" type="submit">Save</button>
                                                </div>
                                            </form>
										</div>

									</div>
                                </li>
                                @endforeach
							</ul>
							<nav class="pagination-block">
								{{$reviews->links('pagination.default')}}
							</nav>
						</div>
					</div>
				</div>
			</div>
		</main>
    @endsection
