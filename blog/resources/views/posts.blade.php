<x-layout> {{-- using the blade component layout.blade from components folder --}}
    @include ('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-post-featured-card />

        <div class="lg:grid lg:grid-cols-2">
            <x-post-card />
            <x-post-card />
        </div>

        <div class="lg:grid lg:grid-cols-3">
            <x-post-card />
            <x-post-card />
            <x-post-card />
        </div>
    </main>

    {{--  Checking for homepage and loading appropriate title  --}}
{{--    @if($isHompage = Request::is('/'))--}}
{{--        <h1>My Blog</h1>--}}
{{--    @else--}}
{{--        <h1>{{ ucfirst(Request::segments()[0]) }}</h1>--}}
{{--    @endif--}}

{{--    --}}{{-- posts is an array of all post files as objects, we loop over and build the homepage --}}
{{--    @foreach ($posts as $post) --}}{{-- Laravel syntax foreach --}}
{{--        <article>--}}
{{--            <h1>--}}
{{--                <a href="/posts/{{ $post->slug }}" > --}}{{-- accessing a value from the Post Class object --}}
{{--                    {{ $post->title }} --}}{{-- blade.php laravel syntax replaces vannilla php "<?= $post->title; ?>" --}}
{{--                </a>--}}
{{--            </h1>--}}
{{--            <x-display-post-attributes--}}
{{--                :authorSlug="$post->author->username"--}}
{{--                :author="$post->author->name"--}}
{{--                :categorySlug="$post->category->slug"--}}
{{--                :category="$post->category->name"--}}
{{--            />--}}
{{--            <div>--}}
{{--                {{ $post->excerpt }}--}}
{{--            </div>--}}
{{--        </article>--}}
{{--    @endforeach--}}

{{--  Loading back button on none-homepage  --}}
{{--    @if(!$isHompage)--}}
{{--        <p>--}}
{{--            <a href="/">Homepage</a>--}}
{{--        </p>--}}
{{--    @endif--}}
</x-layout>
