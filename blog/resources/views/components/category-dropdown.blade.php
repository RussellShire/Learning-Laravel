<div>
    <x-dropdown >
        {{-- Trigger here --}}
        <x-slot name="trigger">
            <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left inline-flex">
                {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }} {{-- Changing the name to the current category, or defaulting to Categories --}}

                <x-down-arrow class="absolute pointer-events-none" style="right: 12px;" />
            </button>
        </x-slot>

        {{-- Slot here --}}
        <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}" :active="request()->routeIs('home')">All</x-dropdown-item> {{-- Checking if route is home and highlighting All if so --}}

        @foreach ($categories as $category)
            <x-dropdown-item
                href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}" {{-- Getting a query string from the search box, removing the category and appending to the category dropdown to combine searchbox and dropdown --}}
                :active="request()->is('*' . $category->slug)" {{-- Highlighting the current page in the dropdown menu by checking the url --}}
            >{{ ucwords( $category->name ) }}</x-dropdown-item>
        @endforeach
    </x-dropdown>
</div>
