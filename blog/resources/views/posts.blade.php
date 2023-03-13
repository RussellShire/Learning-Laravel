{{--{{$isHompage = Request::is('/')}}--}}
<x-layout> {{-- using the blade component layout.blade from components folder --}}

    @if($isHompage = Request::is('/'))
        <h1>My Blog</h1>
    @endif

    {{-- posts is an array of all post files as objects, we loop over and build the homepage --}}
    @foreach ($posts as $post) {{-- Laravel syntax foreach --}}
        <article>
            <h1>
                <a href="/posts/{{ $post->slug }}" > {{-- accessing a value from the Post Class object --}}
                    {{ $post->title }} {{-- blade.php laravel syntax replaces vannilla php "<?= $post->title; ?>" --}}
                </a>
            </h1>
            <x-display-post-attributes
                :authorSlug="$post->author->username"
                :author="$post->author->name"
                :categorySlug="$post->category->slug"
                :category="$post->category->name"
            />
            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach

    @if(!$isHompage)
        <p>
            <a href="/">Homepage</a>
        </p>
    @endif
</x-layout>
