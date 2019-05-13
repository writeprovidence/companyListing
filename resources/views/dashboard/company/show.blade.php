@extends('layouts.app')
@section('content')
		<main id="main">
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
                                <ul class="rating-list">
                                    <li>
                                        <div class="title">
                                            <span class="icon">
                                                <i class="fa fa-shield"></i>
                                            </span>
                                            <span>Reliability</span>
                                        </div>
                                        <div class="rating raiting-wrap">
                                            <svg class="star-full" width="2560" height="512" viewBox="0 0 2560 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <clipPath id="r2">
                                                    <path d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z" fill="black"/>
                                                    <path d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z" fill="black"/>
                                                    <path d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z" fill="black"/>
                                                    <path d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z" fill="black"/>
                                                    <path d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z" fill="black"/>
                                                </clipPath>
                                                <g clip-path="url('#r2')">
                                                    <rect fill="#ffd71e" class="r1" x="0" y="0" width="47.5%" height="100%"/>
                                                </g>
                                            </svg>
                                            <svg class="star-empty" width="2560" height="512" viewBox="0 0 2560 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z" fill="#f1f1f1"/>
                                                <path d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z" fill="#f1f1f1"/>
                                                <path d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z" fill="#f1f1f1"/>
                                                <path d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z" fill="#f1f1f1"/>
                                                <path d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z" fill="#f1f1f1"/>
                                            </svg>
                                        </div>
                                        <div class="value">
                                            <strong>10</strong>/10
                                        </div>
                                    </li>
                                    <li>
                                        <div class="title">
                                            <span class="icon">
                                                <i class="fa fa-credit-card"></i>
                                            </span>
                                            <span>Pricing</span>
                                        </div>
                                        <div class="rating raiting-wrap">
                                            <svg class="star-full" width="2560" height="512" viewBox="0 0 2560 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <clipPath id="r3">
                                                    <path d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z" fill="black"/>
                                                    <path d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z" fill="black"/>
                                                    <path d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z" fill="black"/>
                                                    <path d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z" fill="black"/>
                                                    <path d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z" fill="black"/>
                                                </clipPath>
                                                <g clip-path="url('#r3')">
                                                    <rect fill="#ffd71e" class="r1" x="0" y="0" width="92%" height="100%"/>
                                                </g>
                                            </svg>
                                            <svg class="star-empty" width="2560" height="512" viewBox="0 0 2560 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z" fill="#f1f1f1"/>
                                                <path d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z" fill="#f1f1f1"/>
                                                <path d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z" fill="#f1f1f1"/>
                                                <path d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z" fill="#f1f1f1"/>
                                                <path d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z" fill="#f1f1f1"/>
                                            </svg>
                                        </div>
                                        <div class="value">
                                            <strong>10</strong>/10
                                        </div>
                                    </li>
                                    <li>
                                        <div class="title">
                                            <span class="icon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <span>User Friendly</span>
                                        </div>
                                        <div class="rating raiting-wrap">
                                            <svg class="star-full" width="2560" height="512" viewBox="0 0 2560 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <clipPath id="r4">
                                                    <path d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z" fill="black"/>
                                                    <path d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z" fill="black"/>
                                                    <path d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z" fill="black"/>
                                                    <path d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z" fill="black"/>
                                                    <path d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z" fill="black"/>
                                                </clipPath>
                                                <g clip-path="url('#r4')">
                                                    <rect fill="#ffd71e" class="r1" x="0" y="0" width="92%" height="100%"/>
                                                </g>
                                            </svg>
                                            <svg class="star-empty" width="2560" height="512" viewBox="0 0 2560 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z" fill="#f1f1f1"/>
                                                <path d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z" fill="#f1f1f1"/>
                                                <path d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z" fill="#f1f1f1"/>
                                                <path d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z" fill="#f1f1f1"/>
                                                <path d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z" fill="#f1f1f1"/>
                                            </svg>
                                        </div>
                                        <div class="value">
                                            <strong>10</strong>/10
                                        </div>
                                    </li>
                                    <li>
                                        <div class="title">
                                            <span class="icon">
                                                <i class="fa fa-life-ring"></i>
                                            </span>
                                            <span>Support</span>
                                        </div>
                                        <div class="rating raiting-wrap">
                                            <svg class="star-full" width="2560" height="512" viewBox="0 0 2560 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <clipPath id="r5">
                                                    <path d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z" fill="black"/>
                                                    <path d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z" fill="black"/>
                                                    <path d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z" fill="black"/>
                                                    <path d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z" fill="black"/>
                                                    <path d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z" fill="black"/>
                                                </clipPath>
                                                <g clip-path="url('#r2')">
                                                    <rect fill="#ffd71e" class="r5" x="0" y="0" width="92%" height="100%"/>
                                                </g>
                                            </svg>
                                            <svg class="star-empty" width="2560" height="512" viewBox="0 0 2560 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z" fill="#f1f1f1"/>
                                                <path d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z" fill="#f1f1f1"/>
                                                <path d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z" fill="#f1f1f1"/>
                                                <path d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z" fill="#f1f1f1"/>
                                                <path d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z" fill="#f1f1f1"/>
                                            </svg>
                                        </div>
                                        <div class="value">
                                            <strong>10</strong>/10
                                        </div>
                                    </li>
                                    <li>
                                        <div class="title">
                                            <span class="icon">
                                                <i class="fa fa-bar-chart"></i>
                                            </span>
                                            <span>Features</span>
                                        </div>
                                        <div class="rating raiting-wrap">
                                            <svg class="star-full" width="2560" height="512" viewBox="0 0 2560 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <clipPath id="r6">
                                                    <path d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z" fill="black"/>
                                                    <path d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z" fill="black"/>
                                                    <path d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z" fill="black"/>
                                                    <path d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z" fill="black"/>
                                                    <path d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z" fill="black"/>
                                                </clipPath>
                                                <g clip-path="url('#r6')">
                                                    <rect fill="#ffd71e" class="r1" x="0" y="0" width="92%" height="100%"/>
                                                </g>
                                            </svg>
                                            <svg class="star-empty" width="2560" height="512" viewBox="0 0 2560 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M512 198.525L335.11 172.821L256 12.53L176.892 172.821L0 198.525L128 323.294L97.784 499.47L256 416.291L414.216 499.47L383.999 323.294L512 198.525V198.525Z" fill="#f1f1f1"/>
                                                <path d="M1024 198.995L847.11 173.291L768 13L688.892 173.291L512 198.995L640 323.764L609.784 499.94L768 416.761L926.216 499.94L895.999 323.764L1024 198.995V198.995Z" fill="#f1f1f1"/>
                                                <path d="M1536 198.995L1359.11 173.291L1280 13L1200.89 173.291L1024 198.995L1152 323.764L1121.78 499.94L1280 416.761L1438.22 499.94L1408 323.764L1536 198.995V198.995Z" fill="#f1f1f1"/>
                                                <path d="M2048 198.995L1871.11 173.291L1792 13L1712.89 173.291L1536 198.995L1664 323.764L1633.78 499.94L1792 416.761L1950.22 499.94L1920 323.764L2048 198.995V198.995Z" fill="#f1f1f1"/>
                                                <path d="M2560 198.995L2383.11 173.291L2304 13L2224.89 173.291L2048 198.995L2176 323.764L2145.78 499.94L2304 416.761L2462.22 499.94L2432 323.764L2560 198.995V198.995Z" fill="#f1f1f1"/>
                                            </svg>
                                        </div>
                                        <div class="value">
                                            <strong>10</strong>/10
                                        </div>
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
                            <span class="value">213,910 <span class="badge plus">+2,999</span></span>
                        </li>
                    </ul>
                </div>
            </div>
			<section class="details-section">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="filter-block">
								<h3>{{$company->name}}'s Customer Reviews</h3>
								<select class="filter-select">
									<option>Newest First</option>
									<option>Olders First</option>
								</select>
							</div>
							<ul class="review-list">
								<li>
                                    <div class="review-card">
                                        <div class="entry-header">
                                            <span>Review by</span>
                                            <strong>Junaid Ahmed Shah <i>(abcsdsdd.com)</i></strong>
                                            <div class="score">Overall Score: 9.2</div>
                                        </div>
                                        <div class="entry-body">
                                            <div class="date-wrap">
                                                <time datetime="2019-12-04">April 12, 2019</time>
                                            </div>
                                            <div class="text">
                                                <h3><a href="#">Best Web Hosting Company</a></h3>
                                                <p>We have collected the information from different Web Hosting companies to provide you information about the best detals available in the market. We have collected the information from different Web Hosting companies to provide you informationasdasda.</p>
                                            </div>
                                            <ul class="value-list">
                                                <li>
                                                    <span>User-friendliness</span>
                                                    <span class="rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>User-friendliness</span>
                                                    <span class="rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>User-friendliness</span>
                                                    <span class="rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>User-friendliness</span>
                                                    <span class="rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>User-friendliness</span>
                                                    <span class="rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="entry-response">
                                            <h6>{{$company->name}}'s Response</h6>
                                            <p>We have collected the information from different Web Hosting companies to provide you information about the best detals available in the market.</p>
                                        </div>
                                        <div class="entry-footer">
                                            <div class="share-popup popup-holder">
                                                <a class="open rewiew-btn grey-mod" href="#"><i class="fa fa-share-alt"></i>
                                                    <span>Share</span>
                                                    <div class="popup">
                                                        <ul>
                                                            <li>
                                                                <button class="share-btn " type="button">
                                                                    <i class="fa fa-link" aria-hidden="true"></i>
                                                                    <span>Copy Link</span>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button class="share-btn twitter" type="button">
                                                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                                                    <span>Twitter</span>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button class="share-btn facebook" type="button">
                                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                                    <span>Facebook</span>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div>
                                                <span class="entry-text">Is this review helpful to you?</span>
                                                <a class="rewiew-btn" data-value="yes" href="#"><i class="fa fa-thumbs-up"></i> yes</a>
                                                <a class="rewiew-btn" data-value="no" href="#"><i class="fa fa-thumbs-down"></i> no</a>
                                            </div>
                                        </div>
                                    </div>
								</li>

							</ul>
							<nav class="pagination-block">
								<ul class="pagination">
									<li class="page-item"><a class="page-link prev" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</a></li>
									<li class="page-item"><a class="page-link active" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link next" href="#">Next <i class="fa  fa-angle-right" aria-hidden="true"></i></a></li>
								</ul>
							</nav>
						</div>
						<div class="col">
							<aside id="sidebar-right">
								<div class="widget">
									<h3>Website thumbnail</h3>
									<div>
										<img src="{{asset('images/site-preview.png')}}" alt="image description">
									</div>
								</div>
								<div class="widget">
									<h3>Company details</h3>
									<dl class="details-list">
										<div>
											<dt>Email address:</dt>
											<dd><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:{{$company->email}}">{{$company->email}}</a></dd>
										</div>
										<div>
											<dt>Phone number:</dt>
											<dd><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:{{$company->phone}}">{{$company->phone}}</a> ext</dd>
										</div>
										<div>
											<dt>Website:</dt>
											<dd><i class="fa fa-link" aria-hidden="true"></i> <a href="{{$company->website}}">{{$company->website}}</a></dd>
										</div>
									</dl>
								</div>
							</aside>
						</div>
					</div>
				</div>
            </section>
            <section class="about-section section bg-grey text-center">
                <div class="container">
                    <header class="section-header">
                        <h1>About {{$company->name}}</h1>
                    </header>
                    <p>
                        {{$company->description}}
                    </p>
                    <div>
                        <a class="btn btn-green" href="{{$company->website}}">Visit Website</a>
                    </div>
                </div>
            </section>
            <section class="section text-center">
                <div class="container">
                    <header class="section-header">
                        <h1>Global Top Web Hosting Companies</h1>
                    </header>
                    <ul class="hosting-list">
                        <li>
                            <div class="hosting-card">
                                <span class="cnt"></span>
                                <div class="entry-image">
                                    <img src="{{asset('images/bluehost.jpg')}}" alt="bluehost">
                                </div>
                                <ul class="entry-links">
                                    <li><a href="#">Visit Site</a></li>
                                    <li><a href="#">Read Reviews</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="hosting-card">
                                <span class="cnt"></span>
                                <div class="entry-image">
                                    <img src="{{asset('images/bluehost.jpg')}}" alt="bluehost">
                                </div>
                                <ul class="entry-links">
                                    <li><a href="#">Visit Site</a></li>
                                    <li><a href="#">Read Reviews</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="hosting-card">
                                <span class="cnt"></span>
                                <div class="entry-image">
                                    <img src="{{asset('images/bluehost.jpg')}}" alt="bluehost">
                                </div>
                                <ul class="entry-links">
                                    <li><a href="#">Visit Site</a></li>
                                    <li><a href="#">Read Reviews</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="hosting-card">
                                <span class="cnt"></span>
                                <div class="entry-image">
                                    <img src="{{asset('images/bluehost.jpg')}}" alt="bluehost">
                                </div>
                                <ul class="entry-links">
                                    <li><a href="#">Visit Site</a></li>
                                    <li><a href="#">Read Reviews</a></li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </section>
		</main>
@endsection
