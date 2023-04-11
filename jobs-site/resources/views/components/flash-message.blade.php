@if(session()->has('message'))
    <div x-data="{show: true}"                              {{-- AlpineJs state --}}
         x-init="setTimeout(() => show = false, 3000)"      {{-- AlpineJs timer function to change state --}}
         x-show="show"                                      {{-- AlpineJs assign value to element --}}
         class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3 rounded-xl">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif
