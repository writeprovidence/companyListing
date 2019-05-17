<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Web Hosting Companies Ranking, Reviews, Deals & Tips | WH.TIPS</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,700i|Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="canonical" href="url()->current()"/>
    <link media="all" rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
    <script src="{{asset('js/main.js')}}" defer></script>
    <script src="{{asset('js/custom.js')}}" defer></script>
</head>

<body>
    <div id="wrapper">
        <header id="header">

            @auth
                @include('includes.authNavbar')
            @else
                @include('includes.navbar')
            @endauth

            <div class="main-bar">
                <div class="container">
                    <div class="logo">
                        <a href="{{route('index')}}">
                            <img src="{{asset('images/whtips-logo.png')}}" alt="WH Tips" width="140" height="77">
                        </a>
                    </div>
                    <nav class="nav-holder">
                        <ul id="nav">
                            <li class="
                                @if(Request::is('/'))
                                    {{'active'}}
                                @endif
                            ">
                                <a href="{{route('index')}}">Home</a>
                            </li>
                            <li class="
                                @if(Request::is('companies'))
                                    {{'active'}}
                                @endif
                            ">
                                <a href="{{route('companies')}}">Companies</a>
                            </li>
                           <li class="
                                @if(Request::is('reviews'))
                                    {{'active'}}
                                @endif
                            ">
                                <a href="{{route('all.reviews')}}">Reviews</a>
                            </li>
                            <li class="
                                @if(Request::is('rankings'))
                                    {{'active'}}
                                @endif
                            ">
                                <a href="{{route('ranking')}}">Rankings</a>
                            </li>
                            <li class="
                                @if(Request::is('discounts'))
                                    {{'active'}}
                                @endif
                            ">
                                <a href="#">Discounts</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="popup-holder search-popup">
                        <a href="#" class="open">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </a>
                        <div class="popup">
                            <form action="{{route('search')}}" method="GET"class="search-form">
                                <input type="search" name="search" placeholder="Hosting Company">
                                <button type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="burger-wrap">
                        <a href="#" class="nav-opener"><span></span></a>
                    </div>
                </div>
            </div>
        </header>





        @yield('content')




        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <section class="col">
                            <h3>Company</h3>
                            <ul class="footer-links">
                            @foreach($latest_companies as $latest_company)
                                <li><a href="{{route('profile.company', $latest_company->slug)}}">{{$latest_company->name}}</a></li>
                            @endforeach
                            </ul>
                        </section>
                        <section class="col">
                            <h3>Top Web Hosting</h3>
                            <ul class="footer-links">
                                @foreach($top_companies as $top_company)
                                    <li><a href="{{route('profile.company', $top_company->slug)}}">{{$top_company->name}}</a></li>
                                @endforeach
                            </ul>
                        </section>
                        <div class="col">
                            <div class="footer-terms">
                                <ul class="footer-links">
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms of Use</a></li>
                                </ul>
                            </div>
                        </div>
                        <section class="col">
                            <h3>Subscribe</h3>
                            <p>Receive hosting coupons, reviews and more</p>
                            <form action="{{route('subscribe.newsletter')}}" method="POST" class="subscribe-form">
                                @csrf
                                <input type="text" name="name" placeholder="Full Name">
                                <input type="email" name="email" placeholder="Email">
                                <button type="submit">Sign up</button>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
            <div class="bottom-line">
                <div class="container">
                    <div class="copyright-block">
                        <p>Copyright &copy; 2019 WH.TIPS | Hosted by <a href="#">ABCHOST.COM</a></p>
                    </div>
                </div>
            </div>
        </footer>
        </div>
        </body>
            @include('includes.alerts')
        </html>

