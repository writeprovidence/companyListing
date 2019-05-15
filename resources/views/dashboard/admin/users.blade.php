@extends('layouts.app')
@section('content')
		<main id="main">
			<section class="hero-section page-mod" style="background-image: url('images/bg2.jpg');">
				<div class="container">
					<h1>Web Hosting Reviews</h1>
					<p>Unlike other sites, we don't fake hosting reviews, forge ratings or hide anything. Since 2004, we strive to become the most trusted hosting review source delivering all your feedback, both positive and negative. Browse through 19711 reviews by real verified customers or submit your own.</p>
				</div>
			</section>
			<div class="top-layout">
				<div class="container">
					<aside class="top-entry-aside">
						<form action="#" class="advanced-form">
							<h5 class="aside-title">Advanced Search</h5>
							<div class="form-row open-close">
								<select>
									<option>Newest First</option>
									<option>Oldest First</option>
								</select>
							</div>

						</form>
					</aside>
					<div class="top-entry-body">
						<h3 class="top-heading">All Users</h3>
						<ul class="review-list commentr-mod">
                            @foreach($users as $user)
                                <li>
                                    <div class="review-card">
                                        <div class="entry-header">
                                            <h3>{{$user->name}}'s Profile</h3>
                                            <div class="score">Reviews Done: {{$user->reviews()->count()}}</div>
                                        </div>
                                        <ul class="data-review-list">
                                            <li>
                                       	 		<br>
                                                <p>
													<span class="heading">Address</span>
													<span class="value">{{$user->address}}</span>
                                                </p>
											</li>

                                            <li>
                                       	 		<br>
                                                <p>
													<span class="heading">Email</span>
													<span class="value">{{$user->email}}</span>
                                                </p>
                                            </li>

                                            <li>
                                       	 		<br>
                                                <p>
													<span class="heading">Verified</span>
													<span class="value">{{$user->isVerified() ? 'Yes' : 'No'}}</span>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
						</ul>
						<nav class="pagination-block">
							<ul class="pagination">
								{{$users->links('pagination.default')}}
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</main>
@endsection