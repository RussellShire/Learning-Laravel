<x-layout>
    @include('partials._hero') {{-- pulling in partials blade templates partials is folder, _search is file, '.' joins folder --}}
    @include('partials._search')

    @if(count($listings) == 0)
        <p>No listings found, please check back later</p>
    @else
        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
            @foreach($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        </div>
    @endif
</x-layout>
