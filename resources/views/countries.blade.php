@extends('layouts.app')
@section('content')
<main id="main">
    <section class="hero-section page-mod" style="background-image: url('images/bg2.jpg');">
        <div class="container">
            <h1>Web Hosting Companies by Country</h1>
            <p>Find and rate your web hosting service provider or select the best provider for your website. Find and
                rate your web hosting service provider or select the best provider for your website. Find and rate your
                web hosting service provider or select the best provider for your website.</p>
        </div>
    </section>
    <div class="top-layout aside-right">
        <div class="container">
            {{-- <aside class="top-entry-aside">
                <form action="#" class="advanced-form">
                    <h5 class="aside-title">By Country</h5>
                    <div class="form-row open-close">
                        <select class="country">
                            <option value="created_at, desc">Newest First</option>
                            <option value="created_at, asc">Oldest First</option>
                            <option value="score, desc">Highest Score</option>
                            <option value="score, asc">Lowest Score</option>
                            <option value="alexa_global_rank, desc">Alexa Rank</option>
                        </select>
                    </div>
                    <div class="form-row open-close">
                        <h5><a class="opener" href="#">Customer Feedbacks <i class="fa fa-angle-left"
                                    aria-hidden="true"></i></a></h5>
                       <div class="slide">
                                    <div class="custom-checkbox has-stars">
                                        <input type="checkbox"  class="stars" value="5" id="stars5">
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
                                        <input type="checkbox"  class="stars" value="3" id="stars3-4">
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
                                        <input type="checkbox"  class="stars" value="1" id="stars1-2">
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
                                        <input type="checkbox"  class="stars" value="0" id="no-stars">
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
            </aside> --}}
            <div class="top-entry-body">
                <div class="filter-block">
                    <h3>All Companies</h3>
                    <form id="order-result" action="{{route('order.country', Request::segment(3))}}" method="POST" >
                        @csrf
                        <h5 class="aside-title">Advanced Search</h5>
                        <div class="form-row open-close">
                            <select class="filter-select" name="order" onchange="event.preventDefault();
                                                        document.getElementById('order-result').submit(); ">
                                <option value="created_at, desc">Newest First</option>
                                <option value="created_at, asc">Oldest First</option>
                                <option value="score, desc">Highest Score</option>
                                <option value="score, asc">Lowest Score</option>
                                <option value="alexa_global_rank, desc">Alexa Rank</option>
                                {{-- <option value="reviews, desc">Highest Reviews</option> --}}
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
                                    <div class="score">Rating: {{$company->rating}}</div>
                                </div>
                                <div class="entry-company">
                                    <ul class="data-review-list">
                                        <li>
                                            <span class="heading">Rating</span>
                                            <div class="rating">
                                                <span class="rating">
                                                    @for($i = 0; $i < $company->rating; $i++)
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        @endfor
                                                </span>

                                                <span class="value">{{$company->rating}}</span>
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
                                        <a class="btn btn-green" href="{{route('reviews.company', $company->slug)}}">Read Reviews</a>
                                        <a class="btn btn-green" href="{{route('profile.company', $company->slug)}}">Visit Site</a>
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
