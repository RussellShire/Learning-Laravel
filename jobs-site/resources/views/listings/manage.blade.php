<x-layout>
    <div class="mx-4">
        <x-card class="!p-10">
            <header>
                <h1
                    class="text-3xl text-center font-bold my-6 uppercase"
                >
                    Manage Gigs
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>
                    @unless($listings->isEmpty())
                    @foreach($listings as $listing)
                        <x-table-row :listing="$listing" />
                    @endforeach
                    @else
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg flex flex-col">
                                <p class="mx-auto">No listings found</p>
                                <a class="text-laravel mx-auto" href="/listings/create"><i class="fa-solid fa-circle-plus"></i> Create a listing?</a>
                            </td>
                        </tr>
                    @endunless
                </tbody>
            </table>
        </x-card>
    </div>
</x-layout>
