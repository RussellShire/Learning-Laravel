<x-layout> {{-- using the blade component layout.blade from components folder --}}
    {{-- Checking if homepage and loading correct header --}}
    @if($isHompage = Request::is('/'))
        @include ('_posts-header')
    @else
        <h1 class="text-center text-3xl">{{ ucfirst(Request::segments()[0]) }}</h1>
    @endif

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count()) {{-- Checking for posts and loading message if none --}}
            <x-post-featured-card :post="$posts[0]" />

            <div class="lg:grid lg:grid-cols-2">
                @foreach ($posts->skip(1) as $post) {{-- Skip 1 post (because it's being used as featured post, works on collections --}}
                    <x-post-card :post="$post" />
                @endforeach
            </div>
        @else
            <p class="text-center">No posts yet, please check back later.</p>
        @endif
    </main>

{{--      Loading back button on non-homepage  --}}
    @if(!$isHompage)
        <div class="text-center mt-8">
            <a href="/"
               class="transition-colors duration-300 font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
            >Homepage</a>
        </div>
    @endif
</x-layout>
