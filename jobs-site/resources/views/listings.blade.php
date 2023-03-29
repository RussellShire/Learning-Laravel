@extends('layout')

@section('content')
    <h2>{{ $heading }}</h2>

    @if(count($listings) == 0)
    <p>No listings found, please check back later</p>
    @else
        @foreach($listings as $listing)
            <h3>
                <a href="/listings/{{$listing['id']}}">
                    {{ $listing['title'] }}
                </a>
            </h3>
            <p>
                {{ $listing['description'] }}
            </p>
        @endforeach
    @endif
@endsection
