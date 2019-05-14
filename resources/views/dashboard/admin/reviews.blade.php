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

						</form>
					</aside>
					<div class="top-entry-body">
						<h3 class="top-heading">All Reviews</h3>
						<ul class="review-list commentr-mod">
                            @foreach($reviews as $review)
                                <li>
                                    <div class="review-card">
                                        <div class="entry-header">
                                            <h3>{{$review->full_name}}'s Review </h3>
                                            <small>( {{$review->isVerified() ? 'Approved' : 'Not Approved'}} )</small>
                                            @if($review->isVerified())
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
