<div class="flex justify-center mt-20">
    @if (!$this->finished)
        <button wire:click="startedDraw" type="button"
            class="inline-flex items-center px-6 py-3 text-2xl font-medium text-white uppercase bg-red-800 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
            {{-- <button wire:click="startedWishesDraw" type="button" class="inline-flex items-center px-6 py-3 text-2xl font-medium text-white uppercase bg-red-800 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"> --}}
            <!-- Heroicon name: solid/mail -->
            <svg class="w-5 h-5 mr-3 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7">
                </path>
            </svg>
            sorsolás megkezdése
        </button>
    @else
        <div class="flex flex-col items-center gap-10">
            <h2 class="text-2xl">Vége a sorsolásnak!</h2>
            <div class="flex gap-4">
                <a href="{{ route('draw.export') }}"
                    class="inline-flex items-center px-6 py-3 text-2xl font-medium text-white uppercase bg-green-800 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Nyertesek exportálása
                </a>
                <a href="{{ route('draw.GiftPackage.delete') }}"
                    class="inline-flex items-center px-6 py-3 text-2xl font-medium text-white uppercase bg-red-800 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Újra sorsolás
                </a>
            </div>
        </div>
    @endif
</div>

<div class="flex flex-col px-1 mt-20">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xl font-medium tracking-wider text-left text-gray-500 uppercase">
                                Nyeremény neve
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xl font-medium tracking-wider text-center text-gray-500 uppercase">
                                Nyertes neve
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xl font-medium tracking-wider text-center text-gray-500 uppercase">
                                Nyertes email címe
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xl font-medium tracking-wider text-center text-gray-500 uppercase">
                                Pót nyertes neve
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xl font-medium tracking-wider text-center text-gray-500 uppercase">
                                Pót nyertes email címe
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Odd row -->

                        @foreach ($gifts as $gift)
                            <tr class="bg-white">
                                <td class="px-6 py-4 font-medium text-gray-900 text-md whitespace-nowrap">
                                    {{ $gift->name }}</td>
                                <td class="px-6 py-4 text-center text-gray-500 text-md whitespace-nowrap">
                                    {{ $gift->winner != null ? $gift->winner->name : '-' }}</td>
                                <td class="px-6 py-4 text-center text-gray-500 text-md whitespace-nowrap">
                                    {{ $gift->winner != null ? $gift->winner->email : '-' }}</td>
                                <td class="px-6 py-4 text-center text-gray-500 text-md whitespace-nowrap">
                                    {{ $gift->secondaryWinner != null ? $gift->secondaryWinner->name : '-' }}</td>
                                <td class="px-6 py-4 text-center text-gray-500 text-md whitespace-nowrap">
                                    {{ $gift->secondaryWinner != null ? $gift->secondaryWinner->email : '-' }}</td>
                            </tr>
                        @endforeach

                        {{-- @foreach ($gifts as $gift)
                <tr class="bg-white">
                    <td class="px-6 py-4 text-center text-gray-500 text-md whitespace-nowrap">{{ $gift->wish->name}}</td>
                    <td class="px-6 py-4 text-center text-gray-500 text-md whitespace-nowrap">{{ $gift->wish->email}}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 text-md whitespace-nowrap">{{ $gift->name }}</td>
                </tr>
            @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
