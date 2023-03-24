<h1>{{ $heading }}</h1>

@if(count($listings) == 0)
<p>No listings found, please check back later</p>
@else
    @foreach($listings as $listing)
        <h2>
            {{ $listing['title'] }}
        </h2>
        <p>
            {{ $listing['description'] }}
        </p>
    @endforeach
@endif
