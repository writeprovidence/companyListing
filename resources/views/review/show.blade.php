@extends('layouts.app')
@section('content')
		<main id="main">

            @include('includes.reviewheader')

			<section class="details-section">
				<div class="container">
                    <ul class="social-buttons">
                        <li>
                            <a class="facebook" href="#">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                <span>{{$review->full_name}} on facebook</span>
                            </a>
                        </li>
                        <li>
                            <a class="twitter" href="#">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                <span>{{$review->full_name}} on twitter</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="review-list">
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
                                        <h3>{{$review->title}}</h3>
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
                                <div class="entry-response">
                                    <h6>Easyhost Pakistan's Response</h6>
                                    <p>We have collected the information from different Web Hosting companies to provide you information about the best detals available in the market.</p>
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
                                        <a class="rewiew-btn" data-value="yes" data-id="{{$company->slug}}" href="#"><i class="fa fa-thumbs-up"></i> yes</a>
                                        <a class="rewiew-btn" data-value="no" data-id="{{$company->slug}}" href="#"><i class="fa fa-thumbs-down"></i> no</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
				</div>
            </section>

            @include('includes.reviewFooter')

		</main>
@endsection