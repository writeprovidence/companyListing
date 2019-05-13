<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Project Title</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,700i|Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link media="all" rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="{{asset('js/jquery-3.2.1.min.js')}}" defer></script>
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
                            <li class="active">
                                <a href="{{route('index')}}">Home</a>
                            </li>
                            <li>
                                <a href="#">Companies</a>
                            </li>
                            <li>
                                <a href="#">Reviews</a>
                            </li>
                            <li>
                                <a href="#">Rankings</a>
                            </li>
                            <li>
                                <a href="#">Discounts</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="popup-holder search-popup">
                        <a href="#" class="open">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </a>
                        <div class="popup">
                            <form action="#" class="search-form">
                                <input type="search" placeholder="Hosting Company">
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
                                <li><a href="#">ABC Link</a></li>
                                <li><a href="#">ABC Link</a></li>
                                <li><a href="#">ABC Link</a></li>
                                <li><a href="#">ABC Link</a></li>
                                <li><a href="#">ABC Link</a></li>
                            </ul>
                        </section>
                        <section class="col">
                            <h3>Top Web Hosting</h3>
                            <ul class="footer-links">
                                <li><a href="#">Global Best Hosting Companies</a></li>
                                <li><a href="#">Global Best Hosting Companies</a></li>
                                <li><a href="#">Global Best Hosting Companies</a></li>
                                <li><a href="#">Global Best Hosting Companies</a></li>
                                <li><a href="#">Global Best Hosting Companies</a></li>
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
                            <form action="#" class="subscribe-form">
                                <input type="text" placeholder="Full Name">
                                <input type="email" placeholder="Email">
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

        </html>

