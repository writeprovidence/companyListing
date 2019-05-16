<div class="top-bar">
    <div class="container">
        <div class="entry-slogan">
            <p>Web Hosting Directory, Reviews & Rankings</p>
        </div>
        <div class="entry-right">
            <ul class="header-links">

                @if(Auth::user()->isAdmin())
                    <li>
                        <a href="{{route('admin.dashboard')}}">Dashboard</a>
                    </li>

                    <li>
                        <a href="{{route('admin.companies')}}">Manage Companies</a>
                    </li>

                    <li>
                        <a href="{{route('admin.users')}}">Manage Users</a>
                    </li>

                    <li>
                        <a href="{{route('admin.reviews')}}">Manage Reviews</a>
                    </li>

                @else
                    @if(Auth::user()->company()->count())
                        <li>
                            <a href="{{route('edit.company')}}">Update Company</a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('add.company')}}">Add Company</a>
                        </li>
                    @endif
                        <li>
                            <a href="{{route('dashboard')}}">Dashboard</a>
                        </li>
                @endif

                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            <ul class="social-networks">
                <li>
                    <a href="#" class="social-card-box">
                        <div class="social-card">
                            <div class="social-card-front">
                                <i class="fa fa-twitter"></i>
                            </div>
                            <div class="social-card-back twitter">
                                <i class="fa fa-twitter"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-card-box">
                        <div class="social-card">
                            <div class="social-card-front">
                                <i class="fa fa-google"></i>
                            </div>
                            <div class="social-card-back google">
                                <i class="fa fa-google"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-card-box">
                        <div class="social-card">
                            <div class="social-card-front">
                                <i class="fa fa-facebook"></i>
                            </div>
                            <div class="social-card-back facebook">
                                <i class="fa fa-facebook"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-card-box">
                        <div class="social-card">
                            <div class="social-card-front">
                                <i class="fa fa-linkedin"></i>
                            </div>
                            <div class="social-card-back linkedin">
                                <i class="fa fa-linkedin"></i>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
