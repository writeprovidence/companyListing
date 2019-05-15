<section class="hero-section" style="background-image: url('images/bg2.jpg');">
				<div class="container">
                    <div class="header-row">
                        <div class="col">
                            <h1>{{$company->name}}</h1>
                            <span class="site-link"><a href="{{route('redirect.company', $company->slug)}}">{{$company->website}} <i class="fa fa-sign-out"></i></a></span>

                            <div class="text-open-close open-close">
                                <div class="slide">
                                    <p>
                                        {{$company->description}}
                                    </p>
                                </div>
                                <a class="opener" href="#" data-show="show" data-hide="hide">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="btn-holder">
                                <a class="btn btn-green" href="{{route('redirect.company', $company->slug)}}">Visit Website</a>
                                <a class="btn btn-green" href="{{route('add.review' , $company->slug)}}">Submit Review</a>
                            </div>
                            <ul class="socialshare-list">
                                <li>
                                    <a class="fa fa-facebook-official" href="#"></a>
                                </li>
                                <li>
                                    <a  class="fa fa-twitter-square"href="#"></a>
                                </li>
                                <li>
                                    <a class="fa fa-linkedin-square" href="#"></a>
                                </li>
                                <li>
                                    <a class="fa fa-pinterest-square" href="#"></a>
                                </li>
                                <li>
                                    <a class="fa fa-envelope" href="#"></a>
                                </li>
                                <li>
                                    <a class="fa fa-share-alt-square" href="#"></a>
                                </li>
                            </ul>
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
                               <ul class="rating-list">
                                <li>
                                    <span>Reliability</span>
                                    <span class="rating">
                                        @for($i = 0; $i < $company->reliability; $i++)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            @endfor
                                    </span>
                                </li>
                                <li>
                                    <span>Pricing</span>
                                    <span class="rating">
                                        @for($i = 0; $i < $company->pricing; $i++)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            @endfor
                                    </span>
                                </li>
                                <li>
                                    <span>User Friendly</span>
                                    <span class="rating">
                                        @for($i = 0; $i < $company->user_friendly; $i++)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            @endfor
                                    </span>
                                </li>
                                <li>
                                    <span>Support</span>
                                    <span class="rating">
                                        @for($i = 0; $i < $company->support; $i++)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            @endfor
                                    </span>
                                </li>
                                <li>
                                    <span>Features</span>
                                    <span class="rating">
                                        @for($i = 0; $i < $company->features; $i++)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            @endfor
                                    </span>
                                </li>
                            </ul>
                            </div>
                        </div>
                    </div>
				</div>
            </section>
            <div class="company-data">
                <div class="container">
                    <ul class="company-data-list">
                        <li>
                            <strong>Total Reviews</strong>
                            <span class="value">{{$company->reviews->count()}}</span>
                        </li>
                        <li>
                            <strong>Total Domains</strong>
                            <span class="value">213,910 <span class="badge">-2,999</span></span>
                        </li>
                        <li>
                            <strong>Traffic Rank</strong>
                            <span class="value">{{$company->alexa_global_rank}} <span class="badge plus">{{$company->alexa_country_rank}}</span></span>
                        </li>
                    </ul>
                </div>
            </div>

