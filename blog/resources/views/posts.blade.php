<x-layout> {{-- using the blade component layout.blade from components folder --}}
{{-- posts is an array of all post files as objects, we loop over and build the homepage --}}
    @foreach ($posts as $post) {{-- Laravel syntax foreach --}}
        <article>
            <h1>
                <a href="/posts/{{ $post->slug }}" > {{-- accessing a value from the Post Class object --}}
                    {{ $post->title }} {{-- blade.php laravel syntax replaces vannilla php "<?= $post->title; ?>" --}}
                </a>
            </h1>
            <p>
                <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>

            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach
</x-layout>
