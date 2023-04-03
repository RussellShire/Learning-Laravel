@extends('layout')


@section('content')
    @include('partials._search')

    <h2>
        {{ $listing->title }}
    </h2>
    <div class="inline-flex">
        {!! $listing->tags !!}
    </div>
    <p>
        {{ $listing->description }}
    </p>

    <button onclick="location.href='/'" type="button">
        Back
    </button>

@endsection
