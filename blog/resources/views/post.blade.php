<x-layout>
    <article>
        <h1>
            {{ $post->title }} {{-- Laravel syntax for passing in a string --}}
        </h1>
        <p>
            By <a href="/author/{{ $post->user->slug }}">{{$post->user->name}}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>
        <p>
            {!! $post->body !!} {{-- Laravel syntax for passing in html - potientially dangerous with user supplied content --}}
        </p>
    </article>
    <a href="/">Go back</a>
</x-layout>
