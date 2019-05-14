<section class="about-section section bg-grey text-center">
    <div class="container">
        <header class="section-header">
            <h1>About {{$company->name}}</h1>
        </header>
        <p>
            {{$company->description}}
        </p>
        <div>
            <a class="btn btn-green" href="{{route('redirect.company', $company->slug)}}">Visit Website</a>
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
