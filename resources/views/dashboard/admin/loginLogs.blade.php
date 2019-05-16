@extends('layouts.app')
@section('content')
		<main id="main">
			<section class="hero-section page-mod" style="background-image: url('{{asset('images/bg2.jpg')}}');">
				<div class="container">
					<h1>Web Hosting Reviews</h1>
					<p>Unlike other sites, we don't fake hosting reviews, forge ratings or hide anything. Since 2004, we strive to become the most trusted hosting review source delivering all your feedback, both positive and negative. Browse through 19711 reviews by real verified customers or submit your own.</p>
				</div>
			</section>
			<div class="top-layout">
				<div class="container">
					<aside class="top-entry-aside">
					</aside>
					<div class="top-entry-body">
						<h3 class="top-heading">Login Logs</h3>
						<ul class="review-list commentr-mod">
                            @foreach($loginlogs as $log)
                                <li>
                                    <div class="review-card">
                                        <div class="entry-company">
                                            <div>
                                                <ul class="data-review-list">
                                                    <li>
                                                        <span class="heading">{{$log->user->name}}</span>
                                                    </li>
                                                    <li>
                                                        <span class="heading">{{$log->created_at->diffForHumans()}}</span>
                                                    </li>
                                                    <li>
                                                        <span class="heading">{{$log->user_ip}}</span>
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
								{{$loginlogs->links('pagination.default')}}
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</main>
@endsection
