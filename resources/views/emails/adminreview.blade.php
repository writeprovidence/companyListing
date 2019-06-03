<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Review for {{$review->company->name}}</title>
</head>

<body>
    <h1>New review for {{$review->company->name}}</h1>

    <a href="{{route('show.review', [$review->company->slug, $review->slug])}}">Click to see review</a>
</body>

</html>
