@extends('layout')

@section('content')
    <h2>
        {{ $listing['title'] }}
    </h2>
    <p>
        {{ $listing['description'] }}
    </p>

    <button onclick="location.href='/'" type="button">
        Back
    </button>
@endsection
