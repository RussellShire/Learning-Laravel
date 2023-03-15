@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false"> {{-- set dropdown to hidden --}}
{{--  Trigger  --}}
    <div @click="show = ! show"> {{-- toggle show dropdown --}}
        {{ $trigger }}
    </div>



{{--  Dropdown links  --}}
    <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50" style="display: none">
        {{ $slot }}
    </div>
</div>
