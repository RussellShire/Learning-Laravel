@props(['listing'])

@php
    if (!$listing->logo) {
        $companyLogo = 'images/laravel-logo.png';
    } else {
        $companyLogo = 'storage/' . $listing->logo;
    }
@endphp

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src={{asset($companyLogo)}}
            alt="{{ $listing->company }}"
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>

            <x-tags :tags="$listing->tags" />

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
        </div>
    </div>
</x-card>
