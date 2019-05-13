@extends('layouts.app')
@section('content')
		<main id="main">
            <section class="hero-section" style="background-image: url('images/bg2.jpg');">
                <div class="container">
                    <div class="header-row">
                        <div class="col">
                            <h1>Easyhost Pakistan</h1>
                            <span class="site-link"><a href="#">https://www.easyhost.pk <i class="fa fa-sign-out"></i></a></span>
                            <div class="btn-holder">
                                <a class="btn btn-green" href="#">Visit Website</a>
                                <a class="btn btn-green" href="#">Read Reviews</a>
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
                                            <svg class="star-full" width="2560" height="512" viewBox="0 0 2560 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <clipPath id="r1">
                                                    <path d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z" fill="black"/>
                                                    <path d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z" fill="black"/>
                                                    <path d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z" fill="black"/>
                                                    <path d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z" fill="black"/>
                                                    <path d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z" fill="black"/>
                                                </clipPath>
                                                <g clip-path="url('#r1')">
                                                    <rect fill="#fbaf40" class="r1" x="0" y="0" width="92%" height="100%"/>
                                                </g>
                                            </svg>
                                            <svg class="star-empty" width="2560" height="512" viewBox="0 0 2560 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z" fill="#fff"/>
                                                <path d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z" fill="#fff"/>
                                                <path d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z" fill="#fff"/>
                                                <path d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z" fill="#fff"/>
                                                <path d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z" fill="#fff"/>
                                            </svg>
                                        </div>
                                        <span class="value">9.2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			<section class="review-form-section">
                <p class="alert-success">
                    Your review has been Submitted!<br> In order to publicly list your review, please confirm verification link sent you to your email inbox.
                </p>
				<div class="container">
					<form action="#" class="review-form">
						<h2>Voice your opinion about <mark>HosterPK</mark></h2>
						<div class="form-row">
							<label for="title">
								<span>Title (Minimum 2 words) *</span>
								<span>0 out of 1200 characters</span>
                            </label>
                            <p class="alert-danger">The title field is required.</p>
							<input id="title" type="text">
						</div>
						<div class="form-row">
                            <label for="summary">Summary *</label>
                            <p class="alert-danger">The title field is required.</p>
							<textarea id="summary"></textarea>
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
											<input id="reliability-star5" type="radio" name="rate1" value="5" />
											<label for="reliability-star5" title="Excellent">5</label>
											<input id="reliability-star4" type="radio" name="rate1" value="4" />
											<label for="reliability-star4" title="Good">4</label>
											<input id="reliability-star3" type="radio" name="rate1" value="3" />
											<label for="reliability-star3" title="Satisfactory">3</label>
											<input id="reliability-star2" type="radio" name="rate1" value="2" />
											<label for="reliability-star2" title="Bad">2</label>
											<input id="reliability-star1" type="radio" name="rate1" value="1" />
											<label for="reliability-star1" title="Very bad">1</label>
										</fieldset>
									</div>
									<div class="rate-row">
										<span class="rate-label">Pricing</span>
										<fieldset class="rate">
											<input id="pricing-star5" type="radio" name="rate2" value="5" />
											<label for="pricing-star5" title="Excellent">5</label>
											<input id="pricing-star4" type="radio" name="rate2" value="4" />
											<label for="pricing-star4" title="Good">4</label>
											<input id="pricing-star3" type="radio" name="rate2" value="3" />
											<label for="pricing-star3" title="Satisfactory">3</label>
											<input id="pricing-star2" type="radio" name="rate2" value="2" />
											<label for="pricing-star2" title="Bad">2</label>
											<input id="pricing-star1" type="radio" name="rate2" value="1" />
											<label for="pricing-star1" title="Very bad">1</label>
										</fieldset>
									</div>
									<div class="rate-row">
										<span class="rate-label">User Friendly</span>
										<fieldset class="rate">
											<input id="user-friendly-star5" type="radio" name="rate3" value="5" />
											<label for="user-friendly-star5" title="Excellent">5</label>
											<input id="user-friendly-star4" type="radio" name="rate3" value="4" />
											<label for="user-friendly-star4" title="Good">4</label>
											<input id="user-friendly-star3" type="radio" name="rate3" value="3" />
											<label for="user-friendly-star3" title="Satisfactory">3</label>
											<input id="user-friendly-star2" type="radio" name="rate3" value="2" />
											<label for="user-friendly-star2" title="Bad">2</label>
											<input id="user-friendly-star1" type="radio" name="rate3" value="1" />
											<label for="user-friendly-star1" title="Very bad">1</label>
										</fieldset>
									</div>
									<div class="rate-row">
										<span class="rate-label">Support</span>
										<fieldset class="rate">
											<input id="support-star5" type="radio" name="rate4" value="5" />
											<label for="support-star5" title="Excellent">5</label>
											<input id="support-star4" type="radio" name="rate4" value="4" />
											<label for="support-star4" title="Good">4</label>
											<input id="support-star3" type="radio" name="rate4" value="3" />
											<label for="support-star3" title="Satisfactory">3</label>
											<input id="support-star2" type="radio" name="rate4" value="2" />
											<label for="support-star2" title="Bad">2</label>
											<input id="support-star1" type="radio" name="rate4" value="1" />
											<label for="support-star1" title="Very bad">1</label>
										</fieldset>
									</div>
									<div class="rate-row">
										<span class="rate-label">Features</span>
										<fieldset class="rate">
											<input id="features-star5" type="radio" name="rate5" value="5" />
											<label for="features-star5" title="Excellent">5</label>
											<input id="features-star4" type="radio" name="rate5" value="4" />
											<label for="features-star4" title="Good">4</label>
											<input id="features-star3" type="radio" name="rate5" value="3" />
											<label for="features-star3" title="Satisfactory">3</label>
											<input id="features-star2" type="radio" name="rate5" value="2" />
											<label for="features-star2" title="Bad">2</label>
											<input id="features-star1" type="radio" name="rate5" value="1" />
											<label for="features-star1" title="Very bad">1</label>
										</fieldset>
									</div>
								</div>
								<div class="right-col">
									<div class="average-rate-block">
										<span class="title">Your Overall scrore</span>
										<span class="value">
											<span class="average">9.2</span>
											<span>/10</span>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-row">
                            <label for="service">Which service did you use with Easehost.pk?</label>
                            <p class="alert-danger">The title field is required.</p>
							<select id="service">
								<option>- Choose service type -</option>
								<option>option 1</option>
								<option>option 2</option>
								<option>option 3</option>
							</select>
						</div>
						<div class="two-col">
							<div class="col">
								<div class="form-row">
                                    <label for="full-name">Full Name</label>
                                    <p class="alert-danger">The title field is required.</p>
									<input id="full-name" type="text">
								</div>
								<div class="form-row">
									<label for="socia-profiles">Link to ONE of your socia profiles (optional)
										<a class="tooltip-link has-tooltip" title="lorem ipsum dolar" href="#"><i class="fa fa-question-circle"></i></a>
                                    </label>
                                    <p class="alert-danger">The title field is required.</p>
									<input id="socia-profiles" type="text">
								</div>
								<div class="form-row">
                                    <label for="site">The site I host with Easyhost.pk (Optional)</label>
                                    <p class="alert-danger">The title field is required.</p>
									<input id="site" type="text">
								</div>
							</div>
							<div class="col">
								<div class="form-row">
                                    <label for="previous-hosting">Previous Hosting (Optional)</label>
                                    <p class="alert-danger">The title field is required.</p>
									<input id="previous-hosting" type="text">
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
