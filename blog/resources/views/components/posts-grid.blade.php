@props(['posts'])

<x-post-featured-card :post="$posts[0]" />

@if ($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($posts->skip(1) as $post) {{-- Skip 1 post (because it's being used as featured post, works on collections --}}
        <x-post-card
            :post="$post"
            {{-- Ternary locking into laravel loop object to change styling for 3rd item --}}
            class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}"
        />
        @endforeach
    </div>
@endif
