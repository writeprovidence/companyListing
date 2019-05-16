@extends('layouts.app')
@section('content')
		<main id="main">
            <section class="hero-section" style="background-image: url('images/bg2.jpg');">
                <div class="container">
                    <div class="header-row">
                        <div class="col">
                            <h1>{{$company->name}}</h1>
                            <span class="site-link"><a href="{{route('redirect.company', $company->slug)}}">{{$company->website}} <i
                                        class="fa fa-sign-out"></i></a></span>
                            <div class="btn-holder">
                                <a class="btn btn-green" href="{{route('redirect.company', $company->slug)}}">Visit Website</a>
                                <a class="btn btn-green" href="{{route('reviews.company',$company->slug)}}">Read Reviews</a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="company-rating-card">
                                <header>
                                    <h3>Company Rating</h3>
                                </header>
                                <div class="entry-body">
                                    <span class="score-title">Overall Score:</span>
                                    <div class="rating-block">
                                        <span class="rating">
                                            @for($i = 0; $i < $company->rating; $i++)
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                @endfor
                                        </span>

                                        <span class="value">{{$company->rating}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			<section class="review-form-section">
                @if(session('success'))
                    <p class="alert-success">
                        Your review has been Submitted!<br> In order to publicly list your review, please confirm verification link sent you to your full_name inbox.
                    </p>
                @endif
				<div class="container">
					<form id="review-form" action="{{route('store.review', $company->slug)}}" method="POST" class="review-form">
                        @csrf
						<h2>Voice your opinion about <mark>{{$company->name}}</mark></h2>

                        <div class="form-row">
                            <label for="title">Title:</label>
                            <input id="title" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" title="title" name="title"
                                value="{{ old('title') }}" placeholder="Title *" required>

                            @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="review">Summary:</label>
                            <textarea id="review" name="review"> {{ old('review')}}</textarea>
                        </div>

                       <div class="form-row">
                            <label for="full_name">Full Name:</label>
                                <input id="full_name" type="text" class="form-control {{ $errors->has('full_name') ? ' is-invalid' : '' }}" name="full_name"
                                    value="{{ old('full_name') }}" placeholder="Full Name *" required>

                            @if ($errors->has('full_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('full_name') }}</strong>
                            </span>
                            @endif
                        </div>

						<div class="form-row">
							<div>
                                <span class="label">Your Scores (click on the stars) *</span>
							</div>
							<div class="rate-box">
								<div class="left-col">
									<div class="rate-row">
										<span class="rate-label">Reliability</span>
										<fieldset class="rate">
											<input id="reliability-star5" type="radio" title="rate1" name="reliability" value="5" />
											<label for="reliability-star5" title="Excellent">5</label>
											<input id="reliability-star4" type="radio" title="rate1" name="reliability" value="4" />
											<label for="reliability-star4" title="Good">4</label>
											<input id="reliability-star3" type="radio" title="rate1"name="reliability"  value="3" />
											<label for="reliability-star3" title="Satisfactory">3</label>
											<input id="reliability-star2" type="radio" title="rate1" name="reliability" value="2" />
											<label for="reliability-star2" title="Bad">2</label>
											<input id="reliability-star1" type="radio" title="rate1" name="reliability" value="1" />
											<label for="reliability-star1" title="Very bad">1</label>
										</fieldset>
									</div>
									<div class="rate-row">
										<span class="rate-label">Pricing</span>
										<fieldset class="rate">
											<input id="pricing-star5" type="radio" title="rate2" name="pricing" value="5" />
											<label for="pricing-star5" title="Excellent">5</label>
											<input id="pricing-star4" type="radio" title="rate2" name="pricing" value="4" />
											<label for="pricing-star4" title="Good">4</label>
											<input id="pricing-star3" type="radio" title="rate2" name="pricing" value="3" />
											<label for="pricing-star3" title="Satisfactory">3</label>
											<input id="pricing-star2" type="radio" title="rate2" name="pricing" value="2" />
											<label for="pricing-star2" title="Bad">2</label>
											<input id="pricing-star1" type="radio" title="rate2" name="pricing" value="1" />
											<label for="pricing-star1" title="Very bad">1</label>
										</fieldset>
									</div>
									<div class="rate-row">
										<span class="rate-label">User Friendly</span>
										<fieldset class="rate">
											<input id="user-friendly-star5" type="radio" title="rate3" name="user_friendly" value="5" />
											<label for="user-friendly-star5" title="Excellent">5</label>
											<input id="user-friendly-star4" type="radio" title="rate3" name="user_friendly" value="4" />
											<label for="user-friendly-star4" title="Good">4</label>
											<input id="user-friendly-star3" type="radio" title="rate3" name="user_friendly" value="3" />
											<label for="user-friendly-star3" title="Satisfactory">3</label>
											<input id="user-friendly-star2" type="radio" title="rate3" name="user_friendly" value="2" />
											<label for="user-friendly-star2" title="Bad">2</label>
											<input id="user-friendly-star1" type="radio" title="rate3" name="user_friendly" value="1" />
											<label for="user-friendly-star1" title="Very bad">1</label>
										</fieldset>
									</div>
									<div class="rate-row">
										<span class="rate-label">Support</span>
										<fieldset class="rate">
											<input id="support-star5" type="radio" title="rate4" name="support" value="5" />
											<label for="support-star5" title="Excellent">5</label>
											<input id="support-star4" type="radio" title="rate4" name="support" value="4" />
											<label for="support-star4" title="Good">4</label>
											<input id="support-star3" type="radio" title="rate4" name="support" value="3" />
											<label for="support-star3" title="Satisfactory">3</label>
											<input id="support-star2" type="radio" title="rate4" name="support" value="2" />
											<label for="support-star2" title="Bad">2</label>
											<input id="support-star1" type="radio" title="rate4" name="support" value="1" />
											<label for="support-star1" title="Very bad">1</label>
										</fieldset>
									</div>
									<div class="rate-row">
										<span class="rate-label">Features</span>
										<fieldset class="rate">
											<input id="features-star5" type="radio" title="rate5" name="features" value="5" />
											<label for="features-star5" title="Excellent">5</label>
											<input id="features-star4" type="radio" title="rate5" name="features" value="4" />
											<label for="features-star4" title="Good">4</label>
											<input id="features-star3" type="radio" title="rate5" name="features" value="3" />
											<label for="features-star3" title="Satisfactory">3</label>
											<input id="features-star2" type="radio" title="rate5" name="features" value="2" />
											<label for="features-star2" title="Bad">2</label>
											<input id="features-star1" type="radio" title="rate5" name="features" value="1" />
											<label for="features-star1" title="Very bad">1</label>
										</fieldset>
									</div>
								</div>
								<div class="right-col">
									<div class="average-rate-block">
										<span class="title">Your Overall scrore</span>
										<span class="value">
											<span id="average" class="average">0</span>
											<span>/10</span>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="submit-wrap">
							<button class="btn" type="submit">Submit Review</button>
						</div>
					</form>
				</div>
			</section>
		</main>
@endsection
