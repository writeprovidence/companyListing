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
                        Your review has been Updated
                    </p>
                @endif
				<div class="container">
					<form action="{{route('admin.updatereview', $review->slug)}}" method="POST" class="review-form">
                        @csrf
						<h2>Voice your opinion about <mark>{{$company->name}}</mark></h2>

                        <div class="form-row">
                            <label for="title">Title:</label>
                            <input id="title" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" title="title" name="title"
                                value="{{ $review->title}}" placeholder="Title *" required>

                            @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="review">Summary:</label>
                            <textarea id="review" name="review"> {{ $review->review }}</textarea>
                        </div>

                       <div class="form-row">
                            <label for="full_name">Full Name:</label>
                                <input id="full_name" type="text" class="form-control {{ $errors->has('full_name') ? ' is-invalid' : '' }}" name="full_name"
                                    value="{{ $review->full_name }}" placeholder="Full Name *" required>

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
                                           <input id="reliability-star1" type="radio" name="reliability" title="rate1" value="1"
                                                @if($review->reliability == 5){{'checked'}}@endif
                                            />
											<label for="reliability-star5" title="Excellent">5</label>
                                            <input id="reliability-star4" type="radio" name="reliability" title="rate1" value="4"
                                                @if($review->reliability == 4){{'checked'}}@endif
                                            />
											<label for="reliability-star4" title="Good">4</label>
                                            <input id="reliability-star3" type="radio" name="reliability" title="rate1" value="3"
                                                @if($review->reliability == 3){{'checked'}}@endif
                                            />
											<label for="reliability-star3" title="Satisfactory">3</label>
                                            <input id="reliability-star2" type="radio" name="reliability" title="rate1" value="2"
                                                @if($review->reliability == 2){{'checked'}}@endif
                                            />
											<label for="reliability-star2" title="Bad">2</label>
                                            <input id="reliability-star1" type="radio" name="reliability" title="rate1" value="1"
                                                @if($review->reliability == 1){{'checked'}}@endif
                                            />
											<label for="reliability-star1" title="Very bad">1</label>
										</fieldset>
									</div>
									<div class="rate-row">
										<span class="rate-label">Pricing</span>
										<fieldset class="rate">
                                            <input id="pricing-star5" type="radio" name="pricing"  title="rate2" value="5"
                                                @if($review->pricing == 5){{'checked'}}@endif
                                            />
											<label for="pricing-star5" title="Excellent">5</label>
                                            <input id="pricing-star4" type="radio"  name="pricing" title="rate2" value="4"
                                                @if($review->pricing == 4){{'checked'}}@endif
                                            />
											<label for="pricing-star4" title="Good">4</label>
                                            <input id="pricing-star3" type="radio"  name="pricing" title="rate2" value="3"
                                                @if($review->pricing == 3){{'checked'}}@endif
                                            />
											<label for="pricing-star3" title="Satisfactory">3</label>
                                            <input id="pricing-star2" type="radio"  name="pricing" title="rate2" value="2"
                                                @if($review->pricing == 2){{'checked'}}@endif
                                            />
											<label for="pricing-star2" title="Bad">2</label>
                                            <input id="pricing-star1" type="radio"  name="pricing" title="rate2" value="1"
                                                @if($review->pricing == 1){{'checked'}}@endif
                                            />
											<label for="pricing-star1" title="Very bad">1</label>
										</fieldset>
									</div>
									<div class="rate-row">
										<span class="rate-label">User Friendly</span>
										<fieldset class="rate">
                                            <input id="user-friendly-star5" type="radio name="user_friendly"" title="rate3" value="5"
                                                @if($review->user_friendly == 5){{'checked'}}@endif
                                            />
											<label for="user-friendly-star5" title="Excellent">5</label>
                                            <input id="user-friendly-star4" type="radio" name="user_friendly" title="rate3" value="4"
                                                @if($review->user_friendly == 4){{'checked'}}@endif
                                            />
											<label for="user-friendly-star4" title="Good">4</label>
                                            <input id="user-friendly-star3" type="radio" name="user_friendly" title="rate3" value="3"
                                                @if($review->user_friendly == 3){{'checked'}}@endif
                                            />
											<label for="user-friendly-star3" title="Satisfactory">3</label>
                                            <input id="user-friendly-star2" type="radio" name="user_friendly" title="rate3" value="2"
                                                @if($review->user_friendly == 2){{'checked'}}@endif
                                            />
											<label for="user-friendly-star2" title="Bad">2</label>
                                            <input id="user-friendly-star1" type="radio" name="user_friendly" title="rate3" value="1"
                                                @if($review->user_friendly == 1){{'checked'}}@endif
                                            />
											<label for="user-friendly-star1" title="Very bad">1</label>
										</fieldset>
									</div>
									<div class="rate-row">
										<span class="rate-label">Support</span>
										<fieldset class="rate">
                                            <input id="support-star5" type="radio" name="support"  title="rate4" value="5"
                                                @if($review->support == 5){{'checked'}}@endif
                                            />
											<label for="support-star5" title="Excellent">5</label>
                                            <input id="support-star4" type="radio"  name="support" title="rate4" value="4"
                                                @if($review->support == 4){{'checked'}}@endif
                                            />
											<label for="support-star4" title="Good">4</label>
                                            <input id="support-star3" type="radio"  name="support" title="rate4" value="3"
                                                @if($review->support == 3){{'checked'}}@endif
                                            />
											<label for="support-star3" title="Satisfactory">3</label>
                                            <input id="support-star2" type="radio"  name="support" title="rate4" value="2"
                                                @if($review->support == 2){{'checked'}}@endif
                                            />
											<label for="support-star2" title="Bad">2</label>
                                            <input id="support-star1" type="radio"  name="support" title="rate4" value="1"
                                                @if($review->support == 1){{'checked'}}@endif
                                            />
											<label for="support-star1" title="Very bad">1</label>
										</fieldset>
									</div>
									<div class="rate-row">
										<span class="rate-label">Features</span>
										<fieldset class="rate">
                                            <input id="features-star5" type="radio" name="features" title="rate5" value="5"
                                                @if($review->features == 5){{'checked'}}@endif
                                            />
											<label for="features-star5" title="Excellent">5</label>
                                            <input id="features-star4" type="radio" name="features" title="rate5" value="4"
                                                @if($review->features == 4){{'checked'}}@endif
                                            />
											<label for="features-star4" title="Good">4</label>
                                            <input id="features-star3" type="radio" name="features" title="rate5" value="3"
                                                @if($review->features == 3){{'checked'}}@endif
                                            />
											<label for="features-star3" title="Satisfactory">3</label>
                                            <input id="features-star2" type="radio" name="features" title="rate5" value="2"
                                                @if($review->features == 2){{'checked'}}@endif
                                            />
											<label for="features-star2" title="Bad">2</label>
                                            <input id="features-star1" type="radio" name="features" title="rate5" value="1"
                                                @if($review->features == 1){{'checked'}}@endif
                                            />
											<label for="features-star1" title="Very bad">1</label>
										</fieldset>
									</div>
								</div>
								<div class="right-col">
									<div class="average-rate-block">
										<span class="title">Your Overall scrore</span>
										<span class="value">
											<span id="average" class="average">{{$review->score}}</span>
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
