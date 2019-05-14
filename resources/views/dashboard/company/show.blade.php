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
								<select class="filter-select">
									<option>Newest First</option>
									<option>Olders First</option>
								</select>
							</div>
							<ul class="review-list">
								<li>
                                    <div class="review-card">
                                        <div class="entry-header">
                                            <span>Review by</span>
                                            <strong>Junaid Ahmed Shah <i>(abcsdsdd.com)</i></strong>
                                            <div class="score">Overall Score: 9.2</div>
                                        </div>
                                        <div class="entry-body">
                                            <div class="date-wrap">
                                                <time datetime="2019-12-04">April 12, 2019</time>
                                            </div>
                                            <div class="text">
                                                <h3><a href="#">Best Web Hosting Company</a></h3>
                                                <p>We have collected the information from different Web Hosting companies to provide you information about the best detals available in the market. We have collected the information from different Web Hosting companies to provide you informationasdasda.</p>
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
                                            <h6>{{$company->name}}'s Response</h6>
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
                                                <a class="rewiew-btn" data-id="{{$company->id}}" data-value="yes" href="#"><i class="fa fa-thumbs-up"></i> yes</a>
                                                <a class="rewiew-btn" data-id="{{$company->id}}" data-value="no" href="#"><i class="fa fa-thumbs-down"></i> no</a>
                                            </div>
                                        </div>
                                    </div>
								</li>

							</ul>
							<nav class="pagination-block">
								<ul class="pagination">
									<li class="page-item"><a class="page-link prev" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</a></li>
									<li class="page-item"><a class="page-link active" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link next" href="#">Next <i class="fa  fa-angle-right" aria-hidden="true"></i></a></li>
								</ul>
							</nav>
						</div>
						<div class="col">
							<aside id="sidebar-right">
								<div class="widget">
									<h3>Website thumbnail</h3>
									<div>
										<img src="{{asset('images/site-preview.png')}}" alt="image description">
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
											<dd><i class="fa fa-link" aria-hidden="true"></i> <a href="{{$company->website}}">{{$company->website}}</a></dd>
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
                        <a class="btn btn-green" href="{{$company->website}}">Visit Website</a>
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
