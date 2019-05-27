@extends('layouts.app')
@section('content')
		<main id="main">
            <section class="hero-section" style="background-image: url('{{asset('images/bg2.jpg')}}');">
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
                                        <div class="raiting-wrap">
                                            <svg class="star-full" width="2560" height="512" viewBox="0 0 2560 512" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <clipPath id="r1">
                                                    <path
                                                        d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z"
                                                        fill="black"></path>
                                                    <path
                                                        d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z"
                                                        fill="black"></path>
                                                    <path
                                                        d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z"
                                                        fill="black"></path>
                                                    <path
                                                        d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z"
                                                        fill="black"></path>
                                                    <path
                                                        d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z"
                                                        fill="black"></path>
                                                </clipPath>
                                                <g clip-path="url('#r1')">
                                                    <rect fill="#fbaf40" class="r1" x="0" y="0" width="{{$company->percentagerating}}%" height="100%">
                                                    </rect>
                                                </g>
                                            </svg>
                                            <svg class="star-empty" width="2560" height="512" viewBox="0 0 2560 512" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z"
                                                    fill="#fff"></path>
                                                <path
                                                    d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z"
                                                    fill="#fff"></path>
                                                <path
                                                    d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z"
                                                    fill="#fff"></path>
                                                <path
                                                    d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z"
                                                    fill="#fff"></path>
                                                <path
                                                    d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z"
                                                    fill="#fff"></path>
                                            </svg>
                                        </div>
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
                            @if ($errors->has('title'))
                            <p class="alert-danger">{{ $errors->first('title') }}</p>
                            @endif

                            <input id="title" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" title="title" name="title"
                                value="{{ old('title') }}" placeholder="Title *" required>
                        </div>

                        <div class="form-row">
                            <label for="review">Summary:</label>
                            @if ($errors->has('review'))
                            <p class="alert-danger">{{ $errors->first('review') }}</p>
                            @endif
                            <textarea id="review" name="review"> {{ old('review')}}</textarea>
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
                        <div class="form-row">
                            <label for="service">Which service did you use with Easehost.pk?</label>
                            @if ($errors->has('service'))
                                <p class="alert-danger">{{ $errors->first('service') }}</p>
                                @endif
                            <select id="service" name="service">
                                <option value="NULL">- Choose service type -</option>
                                <option value="option">option 1</option>
                                <option value="option">option 2</option>
                                <option value="option">option 3</option>
                            </select>
                        </div>
                        <div class="two-col">
                            <div class="col">
                                <div class="form-row">
                                    <label for="full-name">Full Name:</label>
                                        @if ($errors->has('full_name'))
                                        <p class="alert-danger">{{ $errors->first('full_name') }}</p>
                                        @endif
                                    <input id="full_name" type="text" class="form-control {{ $errors->has('full_name') ? ' is-invalid' : '' }}"
                                        name="full_name" value="{{ old('full_name') }}" placeholder="Full Name *" required>
                                </div>

                                <div class="form-row">
                                    <label for="full-name">Email:</label>
                                        @if ($errors->has('email'))
                                        <p class="alert-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                    <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email" value="{{ old('email') }}" placeholder="Email *" required>
                                </div>

                                <div class="form-row">
                                    <label for="socia-profiles">Link to ONE of your social profiles (optional)
                                        <a class="tooltip-link has-tooltip" title="lorem ipsum dolar" ><i
                                                class="fa fa-question-circle"></i></a>
                                    </label>
                                   @if ($errors->has('social_profile'))
                                    <p class="alert-danger">{{ $errors->first('social_profile') }}</p>
                                    @endif
                                    <input id="socia-profiles" type="text" class="form-control {{ $errors->has('social_profile') ? ' is-invalid' : '' }}"
                                        name="social_profile" value="{{ old('social_profile') }}" placeholder="Social Profile">
                                </div>
                                <div class="form-row">
                                    <label for="site">The site I host with Easyhost.pk (Optional)</label>
                                    @if ($errors->has('site'))
                                    <p class="alert-danger">{{ $errors->first('site') }}</p>
                                    @endif
                                    <input id="site" type="text" class="form-control {{ $errors->has('site') ? ' is-invalid' : '' }}"
                                        name="site" value="{{ old('site') }}" placeholder="Hosted Website">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-row">
                                    <label for="previous-hosting">Previous Hosting (Optional)</label>
                                    @if ($errors->has('previous_hosting'))
                                    <p class="alert-danger">{{ $errors->first('previous_hosting') }}</p>
                                    @endif
                                    <input id="site" type="text" class="form-control {{ $errors->has('previous_hosting') ? ' is-invalid' : '' }}" name="previous_hosting"
                                        value="{{ old('previous_hosting') }}" placeholder="Previous Hosting">
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
