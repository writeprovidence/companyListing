<header>
    <div class="burger">
        <a href="#" class="aside-opener"><span></span></a>
    </div>
</header>
<ul class="dashboard-nav">
    <li class="
            @if(Request::is('dashboard'))
                {{'active'}}
            @endif
        ">
        <a href="{{route('dashboard')}}">
            <div class="icon-wrap">
                <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            <span>Main</span>
        </a>
    </li>

    <li class="
            @if(Request::is('dashboard/user-profile'))
                {{'active'}}
            @endif
        ">
        <a href="{{route('edit.user')}}">
            <div class="icon-wrap">
                <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            <span>My Profile</span>
        </a>
    </li>

    <li class="
            @if(Request::is('user/resetpassword'))
                {{'active'}}
            @endif
        ">
        <a href="{{route('edit.password.user')}}">
            <div class="icon-wrap">
                <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            <span>Reset Password</span>
        </a>
    </li>
    <li class="
            @if(Request::is('dashboard/company-profile/edit'))
                {{'active'}}
            @endif
        ">
        <a href="{{route('edit.company')}}">
            <div class="icon-wrap">
                <i class="fa fa-cog" aria-hidden="true"></i>
            </div>
            <span>Company info</span>
        </a>
    </li>

    <li class="
        @if(Request::is('dashboard/nameservers'))
            {{'active'}}
        @endif
        ">
        <a href="{{route('nameservers')}}">
            <div class="icon-wrap">
                <i class="fa fa-filter" aria-hidden="true"></i>
            </div>
            <span>Nameservers</span>
        </a>
    </li>

    <li class="
        @if(Request::is('dashboard/review'))
            {{'active'}}
        @endif
        ">
        <a href="{{route('reviews')}}">
            <div class="icon-wrap">
                <i class="fa fa-comments-o" aria-hidden="true"></i>
            </div>
            <span>Reviews</span>
        </a>
    </li>

    <li class="
        @if(Request::is('dashboard/products'))
            {{'active'}}
        @endif
        ">
        <a href="{{route('products')}}">
            <div class="icon-wrap">
                <i class="fa fa-list-ul" aria-hidden="true"></i>
            </div>
            <span>Company Products</span>
        </a>
    </li>
</ul>
