<li>
    <div class="review-card companies-mod">
        <div class="entry-header">
            <h3>
                <a class="text-white" href="{{route('profile.company', $company->slug)}}">
                    {{$company->name}}
                </a>
            </h3>
            <div class="score">Rating: {{$company->rating}}</div>
        </div>
        <div class="entry-company">
            <ul class="data-review-list">
                <li>
                    <span class="heading">Rating</span>
                    <div class="rating">
                        <span class="rating">
                            @for($i = 0; $i < $company->rating; $i++)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                @endfor
                        </span>

                        <span class="value">{{$company->rating}}</span>
                    </div>
                </li>
                <li>
                    <span class="heading">Reviews</span>
                    <span class="value">{{$company->reviews()->count()}}</span>
                </li>
                <li>
                    <span class="heading">Location</span>
                    <span class="value">{{$company->country}}</span>
                </li>
                <li>
                    <span class="heading">Traffic Rank</span>
                    <span class="value">{{$company->alexa_global_rank}}</span>
                </li>
            </ul>
        </div>
        <div class="entry-body">
            <div class="text-holder">
                <strong>About {{$company->name}}:</strong>
                <p>
                    {{$company->description}}
                </p>
            </div>
            <div class="btn-holder">
                <a class="btn btn-green" href="{{route('reviews.company', $company->slug)}}">Read
                    Reviews</a>
                <a class="btn btn-green" target="_blank" href="{{route('redirect.company', $company->slug)}}">Visit
                    Site</a>
            </div>
        </div>
    </div>
</li>
