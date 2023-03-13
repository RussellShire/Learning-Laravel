<x-layout>
    <article>
        <h1>
            {{ $post->title }} {{-- Laravel syntax for passing in a string --}}
        </h1>
        <x-display-post-attributes
            :authorSlug="$post->author->username"
            :author="$post->author->name"
            :categorySlug="$post->category->slug"
            :category="$post->category->name"
        />
        <p>
            {!! $post->body !!} {{-- Laravel syntax for passing in html - potientially dangerous with user supplied content --}}
        </p>
    </article>
    <a href="/">Go back</a>
</x-layout>
