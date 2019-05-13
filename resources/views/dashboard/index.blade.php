@extends('layouts.app')
@section('content')
<main id="main">
    <div class="dashboard-block">
        <div class="container">
            <div class="dashboard-wrap">

                @include('includes.aside')

                <div class="dashboard-body">
                    <header class="dashmain-head">
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
                                <h1>Easyhost Pakistan</h1>
                                <a href="#">https://wh.tips/asda/asdads/asdsadsa</a>
                            </div>
                            <div class="btn-wrap">
                                <a class="btn btn-green" href="#">View Company Page</a>
                            </div>
                        </div>
                    </header>
                    <div class="dashmain-body">
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
                                                <rect fill="#fbaf40" class="r1" x="0" y="0" width="54%" height="100%" />
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
                                <span class="heading">Reviewss</span>
                                <span class="value">10</span>
                            </li>
                            <li>
                                <span class="heading">Location</span>
                                <span class="value">Pakistan</span>
                            </li>
                            <li>
                                <span class="heading">Traffic Rank</span>
                                <span class="value">2,000,000</span>
                            </li>
                        </ul>
                        <div class="two-columns">
                            <div class="col">
                                <h4>Add Badge To Your Site</h4>
                                <p>Let your customers known that you are verified company!</p>
                                <form action="#" class="dashboard-form">
                                    <div class="form-row">
                                        <input id="name" type="text" value="Text Field">
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

