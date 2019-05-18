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
						<form id="order-result" action="{{route('admin.reviews.order')}}" method="POST" class="advanced-form">
                    @csrf
                    <h5 class="aside-title">Advanced Search</h5>
                    <div class="form-row open-close">
                        <select class="filter-select" name="order" onchange="event.preventDefault();
                                document.getElementById('order-result').submit(); ">
                            <option value="desc">Newest First</option>
                            <option value="asc">Oldest First</option>
                        </select>
                    </div>

                </form>
					</aside>
					<div class="top-entry-body">
						<h3 class="top-heading">All Reviews</h3>
						<ul class="review-list commentr-mod">
                            @foreach($reviews as $review)
                                <li>
                                    <div class="review-card">
                                        <div class="entry-header">
                                            <h3>{{$review->full_name}}'s Review
                                                @if($review->isApproved())
                                                    @if($review->isFeatured())
                                                        <a href="{{route('unfeature.review', $review->slug)}}" class="btn-feature">UnFeature</a>
                                                    @else
                                                          <a href="{{route('feature.review', $review->slug)}}" class="btn-feature">Feature</a>
                                                    @endif
                                                @endif
                                            </h3>

                                            @if($review->isApproved())
                                                <a href="{{route('reject.review', $review->slug)}}">
                                                    <div class="score">
                                                        Reject
                                                    </div>
                                                </a>
                                            @else
                                                <a href="{{route('approve.review', $review->slug)}}">
                                                    <div class="score">
                                                        Approve
                                                    </div>
                                                </a>
                                            @endif
                                        </div>

                                        <div class="entry-company">
                                            <div>
                                                <span class="label">Visit</span>
                                                <strong class="company-link">
                                                    <a href="{{route('show.review',[$review->company->slug, $review->slug])}}">{{$review->full_name}}'s Review</a> &nbsp; &nbsp;
                                                    <a href="{{route('admin.editreview',$review->slug)}}"><i class="fa fa-pencil"></i></a>
                                                </strong>
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
