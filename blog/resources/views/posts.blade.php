@extends('layout')

@section('content')
{{-- posts is an array of all post files as objects, we loop over and build the homepage --}}
    @foreach ($posts as $post) {{-- Laravel syntax foreach --}}
        <article>
            <h1>
                <a href="/posts/{{ $post->slug }}" > {{-- accessing a value from the Post Class object --}}
                    {{ $post->title }} {{-- blade.php laravel syntax replaces vannilla php "<?= $post->title; ?>" --}}
                </a>
            </h1>

            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach
@endsection
