<section class="about-section section bg-grey text-center">
    <div class="container">
        <header class="section-header">
            <h1>About {{$company->name}}</h1>
        </header>
        <p>
            {{$company->description}}
        </p>
        <div>
            <a target="_blank" class="btn btn-green" href="{{route('redirect.company', $company->slug)}}">Visit Website</a>
        </div>
    </div>
</section>

<section class="section text-center">
    <div class="container">
        <header class="section-header">
            <h1>Global Top Web Hosting Companies</h1>
        </header>
        <ul class="hosting-list">
            @foreach($global_companies as $company)
                <li>
                    <div class="hosting-card">
                        <span class="cnt"></span>
                        <div class="entry-image">
                            <p>{{$company->name}}</p>
                        </div>
                        <ul class="entry-links">
                            <li><a href="{{route('profile.company', $company->slug)}}">Visit Site</a></li>
                            <li><a href="{{route('reviews.company', $company->slug)}}">Read Reviews</a></li>
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
