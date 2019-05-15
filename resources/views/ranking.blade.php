@extends('layouts.app')
@section('content')
<main id="main">
    <section class="hero-section page-mod" style="background-image: url('images/bg2.jpg');">
        <div class="container">
            <h1>Web Hosting Companies</h1>
            <p>Find and rate your web hosting service provider or select the best provider for your website. Find and
                rate your web hosting service provider or select the best provider for your website. Find and rate your
                web hosting service provider or select the best provider for your website.</p>
        </div>
    </section>
    <div class="top-layout aside-right">
        <div class="container">
            <aside class="top-entry-aside">
                <form action="#" class="advanced-form">
                    <h5 class="aside-title">By Country</h5>
                    <div class="form-row open-close">
                        <select class="country">
                            <option value="created_at, desc">Newest First</option>
                            <option value="created_at, asc">Oldest First</option>
                            <option value="score, desc">Highest Score</option>
                            <option value="score, asc">Lowest Score</option>
                        </select>
                    </div>
                    <div class="form-row open-close">
                        <h5><a class="opener" href="#">Customer Feedbacks <i class="fa fa-angle-left"
                                    aria-hidden="true"></i></a></h5>
                        <div class="slide">
                            <div class="custom-checkbox has-stars">
                                <input type="checkbox" id="stars5">
                                <label for="stars5">
                                    <span>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>
                                    <span>5 Stars</span>
                                </label>
                            </div>
                            <div class="custom-checkbox has-stars">
                                <input type="checkbox" id="stars3-4">
                                <label for="stars3-4">
                                    <span>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    </span>
                                    <span>3-4 Stars</span>
                                </label>
                            </div>
                            <div class="custom-checkbox has-stars">
                                <input type="checkbox" id="stars1-2">
                                <label for="stars1-2">
                                    <span>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    </span>
                                    <span>1-2 Stars</span>
                                </label>
                            </div>
                            <div class="custom-checkbox has-stars">
                                <input type="checkbox" id="no-stars">
                                <label for="no-stars">
                                    <span>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    </span>
                                    <span>No Stars</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </aside>
            <div class="top-entry-body">
                <div class="filter-block">
                    <h3>Global Top 10 Ranked Companies</h3>
                    <form id="order-result" action="{{route('order.ranking')}}" method="POST">
                        @csrf
                        <h5 class="aside-title">Advanced Search</h5>
                        <div class="form-row open-close">
                            <select class="filter-select" name="order" onchange="event.preventDefault();
                                                        document.getElementById('order-result').submit(); ">
                                <option value="created_at, desc">Newest First</option>
                                <option value="created_at, asc">Oldest First</option>
                                <option value="score, desc">Highest Score</option>
                                <option value="score, asc">Lowest Score</option>
                            </select>
                        </div>

                    </form>

                </div>
                <ul class="review-list commentr-mod">
                    @foreach($companies as $company)
                    <li>
                        <div class="review-card companies-mod">
                            <div class="entry-header">
                                <h3>{{$company->name}}</h3>
                                <div class="score">Rating: 9.2</div>
                            </div>
                            <div class="entry-company">
                                <ul class="data-review-list">
                                    <li>
                                        <span class="heading">Rating</span>
                                        <div class="rating">
                                            <div class="raiting-wrap">
                                                <svg class="star-full" width="2560" height="512" viewBox="0 0 2560 512"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <clipPath id="r1">
                                                        <path
                                                            d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z"
                                                            fill="black" />
                                                        <path
                                                            d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z"
                                                            fill="black" />
                                                        <path
                                                            d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z"
                                                            fill="black" />
                                                        <path
                                                            d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z"
                                                            fill="black" />
                                                        <path
                                                            d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z"
                                                            fill="black" />
                                                    </clipPath>
                                                    <g clip-path="url('#r1')">
                                                        <rect fill="#fbaf40" class="r1" x="0" y="0" width="54%"
                                                            height="100%" />
                                                    </g>
                                                </svg>
                                                <svg class="star-empty" width="2560" height="512" viewBox="0 0 2560 512"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z"
                                                        fill="#e2d7d7" />
                                                    <path
                                                        d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z"
                                                        fill="#e2d7d7" />
                                                    <path
                                                        d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z"
                                                        fill="#e2d7d7" />
                                                    <path
                                                        d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z"
                                                        fill="#e2d7d7" />
                                                    <path
                                                        d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z"
                                                        fill="#e2d7d7" />
                                                </svg>
                                            </div>
                                            <span class="value">5.4</span>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="heading">Reviews</span>
                                        <span class="value">{{$company->reviews()->count()}}</span>
                                    </li>
                                    <li>
                                        <span class="heading">Location</span>
                                        <span class="value">{{$company->country}}</span>
                                    </li>
                                    <li>
                                        <span class="heading">Traffic Rank</span>
                                        <span class="value">{{$company->alexa_global_rank}}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="entry-body">
                                <div class="text-holder">
                                    <strong>About {{$company->name}}:</strong>
                                    <p>
                                        {{$company->description}}
                                    </p>
                                </div>
                                <div class="btn-holder">
                                    <a class="btn btn-green" href="{{route('reviews.company', $company->slug)}}">Read
                                        Reviews</a>
                                    <a class="btn btn-green" href="{{route('profile.company', $company->slug)}}">Visit
                                        Site</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
                <nav class="pagination-block">
                    {{$companies->links('pagination.default')}}
                </nav>
            </div>
        </div>
    </div>
</main>
@endsection
