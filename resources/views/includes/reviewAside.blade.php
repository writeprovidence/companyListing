<aside class="dashboard-aside">
    @include('includes.asidecontent')
    <div class="dashboard-nav-widget">
        <h3>Review Rating</h3>
        <ul>
            <li>
                <a>
                    <span>5 Star</span>
                    <span>{{$five_star_reviews}} reviews</span>
                </a>
            </li>
            <li>
                <a>
                    <span>4 Star</span>
                    <span>{{$four_star_reviews}} reviews</span>
                </a>
            </li>
            <li>
                <a>
                    <span>3 Star</span>
                    <span>{{$three_star_reviews}} reviews</span>
                </a>
            </li>
            <li>
                <a>
                    <span>2 Star</span>
                    <span>{{$two_star_reviews}} reviews</span>
                </a>
            </li>
            <li>
                <a>
                    <span>1 Star</span>
                    <span>{{$one_star_reviews}} reviews</span>
                </a>
            </li>
            <li>
                <a>
                    <span>0 Star</span>
                    <span>{{$zero_star_reviews}} reviews</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
