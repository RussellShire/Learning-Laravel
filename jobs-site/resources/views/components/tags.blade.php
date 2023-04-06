@props(['tags'])

@php
    $tagsArray = explode(",", $tags);                // take a comma seperated string and explode into an array
    $tagsArray = array_map('trim', $tagsArray);     // trim spaces from each element in the array
@endphp
<ul class="flex">
    @foreach($tagsArray as $tag)
        <li
            class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
        >
            <a href="/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
    @endforeach
</ul>
