<x-layout> {{-- using the blade component layout.blade from components folder --}}
    {{-- Checking if homepage and loading correct header --}}
    @if($isHompage = Request::is('/'))
        @include ('posts._header')
    @else
        <h1 class="text-center text-3xl">{{ ucfirst(Request::segments()[0]) }}</h1> {{-- Bit messy this --}}
        @include ('_posts-header')
    @endif

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count()) {{-- Checking for posts and loading message if none --}}
            <x-posts-grid :posts="$posts" />
        @else
            <p class="text-center">No posts yet, please check back later.</p>
        @endif
    </main>

    {{-- Loading back button on non-homepage pages --}}
    @if(!$isHompage)
        <div class="text-center mt-8">
            <a href="/"
               class="transition-colors duration-300 font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
            >Homepage</a>
        </div>
    @endif
</x-layout>
