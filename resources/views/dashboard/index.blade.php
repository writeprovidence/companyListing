@extends('layouts.app')
@section('content')
<main id="main">
    <div class="dashboard-block">
        <div class="container">
            <div class="dashboard-wrap">
                @include('includes.aside')
                <div class="dashboard-body">
                    <header class="dashmain-head">
                        @if(session('success'))
                        <p class="alert-success">
                            {{session('success')}}
                        </p>
                        @endif
                        <div class="user-line">
                            <strong>Welcome {{Auth::user()->name}}</strong>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                               <i class="fa fa-sign-out" aria-hidden="true"></i>
                                <span>Logout</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                                <div class="siteinfo-line">
                                    <div class="sitemeta">
                                        <h1>{{Auth::user()->company->name}}</h1>
                                        <a href="{{route('redirect.company' , Auth::user()->company->slug)}}" target="_blank">{{Auth::user()->company->website}}</a>
                                    </div>
                                    <div class="btn-wrap">

                                        @if(Auth::user()->company()->count())
                                            @if(Auth::user()->company->companyApproved())
                                                <a class="btn btn-green" href="{{route('profile.company',Auth::user()->company->slug)}}">View Company Page</a>
                                            @else
                                             <a class="btn btn-green" href="#">View Company Page</a>
                                            @endif
                                        @else
                                            <a class="btn btn-green" href="{{route('add.company')}}">Add Company</a>
                                        @endif

                                    </div>
                                </div>
                    </header>
                    <div class="dashmain-body">
                        <ul class="data-review-list">
                          <li>
                            <span class="heading">Rating</span>
                            <div class="rating">
                                <span class="rating">
                                    @for($i = 0; $i < Auth::user()->company->rating; $i++)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        @endfor
                                </span>

                                <span class="value">{{Auth::user()->company->rating}}</span>
                            </div>
                        </li>
                            <li>
                                <span class="heading">Reviews</span>
                                <span class="value">{{Auth::user()->company->reviews()->count()}}</span>
                            </li>
                            <li>
                                <span class="heading">Location</span>
                                <span class="value">{{Auth::user()->company->country}}</span>
                            </li>
                            <li>
                                <span class="heading">Traffic Rank</span>
                                <span class="value">{{Auth::user()->company->alexa_global_rank}}</span>
                            </li>
                        </ul>
                        <div class="two-columns">
                            <div class="col">
                                <h4>Add Badge To Your Site</h4>
                                <p>Let your customers known that you are verified company!</p>
                                <form action="{{route('tagline.add')}}" method="POST" class="dashboard-form">
                                    @csrf
                                    <div class="form-row">
                                        <input id="name" type="text" name="tag_line" value="{{old('tag_line') ?? Auth::user()->company->tag_line}}">
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <img src="images/badge-image-size.png" alt="image description" width="125" height="25">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

