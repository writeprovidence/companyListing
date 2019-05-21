@extends('layouts.app')
@section('content')
<main id="main">
    <section class="hero-section page-mod" style="background-image: url('{{asset('images/bg2.jpg')}}');">
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
                            <option value="rating, desc">Highest Score</option>
                            <option value="rating, asc">Lowest Score</option>
                            <option value="alexa_global_rank, desc">Alexa Rank</option>
                        </select>
                    </div>
                </form>

                <form id="order-results" action="{{route('order.companies')}}" method="POST" class="advanced-form">
                    @include('includes.starFilter')
                </form>
            </aside>
            <div class="top-entry-body">
                <div class="filter-block">
                    <h3>All Companies</h3>
                    <form id="order-result" action="{{route('order.companies')}}" method="POST" >
                        @csrf
                        <h5 class="aside-title">Advanced Search</h5>
                        <div class="form-row open-close">
                            <select class="filter-select" name="order" onchange="event.preventDefault();
                                                        document.getElementById('order-result').submit(); ">
                                <option value="created_at, desc">Newest First</option>
                                <option value="created_at, asc">Oldest First</option>
                                <option value="rating, desc">Highest Score</option>
                                <option value="rating, asc">Lowest Score</option>
                                <option value="alexa_global_rank, desc">Alexa Rank</option>
                            </select>
                        </div>

                    </form>

                </div>
                <ul class="review-list commentr-mod">
                    @foreach($companies as $company)
                        @include('includes.companyBox')
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
