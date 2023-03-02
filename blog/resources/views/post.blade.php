@extends('layout')

@section('content')
    <article>
        <h1>
            {{ $post->title }} {{-- Laravel syntax for passing in a string --}}
        </h1>
        <p>
            {!! $post->body !!} {{-- Laravel syntax for passing in html - potientially dangerous with user supplied content --}}
        </p>
    </article>
    <a href="/">Go back</a>
@endsection

