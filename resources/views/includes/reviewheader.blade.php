<section class="hero-section" style="background-image: url('{{asset('images/bg2.jpg')}}');">
				<div class="container">
                    <div class="header-row">
                        <div class="col">
                            <h1>{{$company->name}} <span style="font-size:14px">{{$company->tag_line}}</span> </h1>
                            <span class="site-link"><a  href="{{route('profile.company', $company->slug)}}">{{$company->website}} <i class="fa fa-sign-out"></i></a></span>

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
                                <a class="btn btn-green" target="_blank" href="{{route('redirect.company', $company->slug)}}">Visit Website</a>
                                <a class="btn btn-green" href="{{route('add.review' , $company->slug)}}">Submit Review</a>
                            </div>
                            <ul class="socialshare-list">
                                <li>
                                    <a target="_blank" class="fa fa-facebook-official" href="{{$company->facebook}}"></a>
                                </li>
                                <li>
                                    <a target="_blank" class="fa fa-twitter-square"href="{{$company->twitter}}"></a>
                                </li>
                                <li>
                                    <a target="_blank" class="fa fa-linkedin-square" href="{{$company->linkedin}}"></a>
                                </li>

                                <li>
                                    <a class="fa fa-envelope" href="mailto:{{$company->email}}"></a>
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
                                        <div class="raiting-wrap">
                                            <svg class="star-full" width="2560" height="512" viewBox="0 0 2560 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <clipPath id="r1">
                                                    <path d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z" fill="black"></path>
                                                    <path d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z" fill="black"></path>
                                                    <path d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z" fill="black"></path>
                                                    <path d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z" fill="black"></path>
                                                    <path d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z" fill="black"></path>
                                                </clipPath>
                                                <g clip-path="url('#r1')">
                                                    <rect fill="#fbaf40" class="r1" x="0" y="0" width="{{$company->percentagerating}}%" height="100%"></rect>
                                                </g>
                                            </svg>
                                            <svg class="star-empty" width="2560" height="512" viewBox="0 0 2560 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z" fill="#fff"></path>
                                                <path d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z" fill="#fff"></path>
                                                <path d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z" fill="#fff"></path>
                                                <path d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z" fill="#fff"></path>
                                                <path d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z" fill="#fff"></path>
                                            </svg>
                                        </div>
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
                            <span class="value">{{$company->domains()->count()}}</span>
                        </li>
                        <li>
                            <strong>Traffic Rank</strong>
                            <span class="value">{{$company->alexa_global_rank}} <span class="badge plus">{{$company->alexa_country_rank}}</span></span>
                        </li>
                    </ul>
                </div>
            </div>

