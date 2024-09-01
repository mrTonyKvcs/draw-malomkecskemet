<x-app-layout>
    <div class="flex flex-col px-1 mt-20">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg flex flex-col gap-10">
                    @foreach ($gifts as $gift => $gamers)
                        <div>
                            <h2 class="text-xl font-bold">{{ $gift }}</h2>
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-xl font-medium tracking-wider text-left text-gray-500 uppercase">
                                            #</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xl font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Játékos neve
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xl font-medium tracking-wider text-center text-gray-500 uppercase">
                                            Játékos email címe
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Odd row -->

                                    @foreach ($gamers as $index => $gamer)
                                        <tr class="bg-white">
                                            <td class="px-6 py-4 font-medium text-gray-900 text-md whitespace-nowrap">
                                                {{ $index + 1 }}</td>
                                            <td class="px-6 py-4 font-medium text-gray-900 text-md whitespace-nowrap">
                                                {{ $gamer->name }}</td>
                                            <td class="px-6 py-4 text-center text-gray-500 text-md whitespace-nowrap">
                                                {{ $gamer->email }}</td>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
