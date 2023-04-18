@if (session()->has('success'))
    <div
        {{--      Using Alpine JS to set a timer on flash message      --}}
        x-data="{ show: true }"                         {{-- Setting 'state' --}}
        x-init="setTimeout(() => show = false, 4000)"   {{-- Using JS to change state after 4 secs --}}
        x-show="show"                                   {{-- Setting initial state --}}
        {{--      End of Alpine JS      --}}

        class="fixed bottom-3 right-3 bg-blue-500 rounded-xl text-white py-2 px-4"
    >
        <p>{{ session('success') }}</p> {{--      Alternative Syntax 'session()->get('success')'     --}}
    </div>
@endif
