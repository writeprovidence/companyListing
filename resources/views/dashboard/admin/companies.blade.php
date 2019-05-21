@extends('layouts.app')
@section('content')
		<main id="main">
			<section class="hero-section page-mod" style="background-image: url('{{asset('images/bg2.jpg')}}');">
				<div class="container">
					<h1>Web Hosting Companies</h1>
					<p>Unlike other sites, we don't fake hosting reviews, forge ratings or hide anything. Since 2004, we strive to become the most trusted hosting review source delivering all your feedback, both positive and negative. Browse through 19711 reviews by real verified customers or submit your own.</p>
				</div>
			</section>
			<div class="top-layout">
				<div class="container">
					<aside class="top-entry-aside">
                        <form id="order-result" action="{{route('admin.companies.order')}}" method="POST" class="advanced-form">
                            @csrf
                            <h5 class="aside-title">Advanced Search</h5>
                            <div class="form-row open-close">
                                <select class="filter-select" name="order" onchange="event.preventDefault();
                                                                document.getElementById('order-result').submit(); ">
                                    <option value="desc">Newest First</option>
                                    <option value="asc">Oldest First</option>
                                </select>
                            </div>

                        </form>
                        <form id="order-results" action="{{route('companies.search')}}" method="GET" class="advanced-form">
                            @include('includes.namesearchform')
                        </form>
                    </aside>
					<div class="top-entry-body">
						<h3 class="top-heading">All Companies</h3>
						<ul class="review-list commentr-mod">
                            @foreach($companies as $company)
                                <li>
                                    <div class="review-card">
                                        <div class="entry-header">
                                            <h3>{{$company->name}} Company
                                                @if($company->companyApproved())
                                                    @if($company->isFeatured())
                                                        <a href="{{route('unfeature.company', $company->slug)}}" class="btn-feature">UnFeature</a>
                                                    @else
                                                    <a href="{{route('feature.company', $company->slug)}}" class="btn-feature">Feature</a>
                                                    @endif
                                                @endif
                                            </h3>



                                            @if($company->companyApproved())
                                                <a href="{{route('reject.company', $company->slug)}}">
                                                    <div class="score">
                                                        Reject
                                                    </div>
                                                </a>
                                            @else
                                                <a href="{{route('approve.company', $company->slug)}}">
                                                    <div class="score">
                                                        Approve
                                                    </div>
                                                </a>
                                            @endif
                                        </div>

                                        <div class="entry-company">
                                            <div>
                                                <span class="label">Visit</span>
                                                <strong class="company-link">
                                                    <a href="{{route('profile.company',$company->slug)}}">{{$company->name}}'s Profile</a> &nbsp; &nbsp;
                                                    <a href="{{route('admin.editcompany',$company->slug)}}"><i class="fa fa-pencil"></i></a>
                                                </strong>
                                            </div>
                                            <div>
                                                <ul class="data-review-list">
                                                    <li>
                                                        <span class="heading">Phone</span>
                                                    <a href="tel:{{$company->phone}}">{{$company->phone}}</a>
                                                    </li>

                                                    <li>
                                                        <span class="heading">Total Reviews</span>
                                                        <span class="value">{{$company->reviews()->count()}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            @endforeach
						</ul>
						<nav class="pagination-block">
							<ul class="pagination">
								{{$companies->links('pagination.default')}}
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</main>
@endsection
