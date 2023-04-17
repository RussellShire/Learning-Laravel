<x-layout> {{-- using the blade component layout.blade from components folder --}}
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count()) {{-- Checking for posts and loading message if none --}}
            <x-posts-grid :posts="$posts" />

            {{ $posts->links() }} {{-- Render pagination links --}}
        @else
            <p class="text-center">No posts yet, please check back later.</p>
        @endif
    </main>
</x-layout>
