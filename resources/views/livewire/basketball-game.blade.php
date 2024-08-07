<div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="flex flex-col px-1">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div x-data="{ showMessage: @entangle('showMessage') }" @hide-message.window="setTimeout(() => showMessage = false, 10000)"
                    class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg bg-white py-7 px-10">
                    <h2 class="text-xl font-bold mb-7 border-b-2 pb-3">Új játékos</h2>

                    @if (session()->has('message'))
                        <div x-show="showMessage" x-transition class="alert alert-success">
                            <div class="rounded-md bg-green-50 p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-800">{{ session('message') }}</p>
                                    </div>
                                    <div class="ml-auto pl-3">
                                        <div class="-mx-1.5 -my-1.5">
                                            <button type="button"
                                                class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
                                                <span class="sr-only">Dismiss</span>
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true">
                                                    <path
                                                        d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form wire:submit.prevent="submit">
                        <div class="grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-12">
                            <div class="sm:col-span-4">
                                <label for="name"
                                    class="block text-md font-medium leading-6 text-gray-900">Név</label>
                                <div class="mt-2">
                                    <input type="text" name="name" wire:model="name" id="name"
                                        autocomplete="name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        placeholder="Teszt Elek" required>
                                    @error('name')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="email" class="block text-md font-medium leading-6 text-gray-900">E-mail
                                    cím</label>
                                <div class="mt-2">
                                    <input type="email" name="email" wire:model="email" id="email"
                                        autocomplete="email"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        placeholder="elek@malomkecskemet.hu" required>
                                    @error('email')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="points" class="block text-md font-medium leading-6 text-gray-900">Elért
                                    pontszám</label>
                                <div class="mt-2">
                                    <input type="number" name="points" wire:model="points" id="points"
                                        autocomplete="points"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        placeholder="100" required>
                                    @error('points')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-2 flex items-end">
                                <div class="w-full">
                                    <button type="submit"
                                        class="w-full uppercase rounded-md bg-green-600 px-3 py-2 text-sm font-bold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                                        Hozzáad
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="inline-block w-full py-2 align-middle sm:px-6 lg:px-8" style="min-height: 500px">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg bg-white py-7 px-10"
                    style="min-height: 500px">
                    <h2 class="text-xl font-bold mb-7 border-b-2 pb-3">Játékosok</h2>

                    <div class="mb-4">
                        <label id="listbox-label"
                            class="block text-sm font-medium leading-6 text-gray-900">Szűrés</label>
                        <div class="relative mt-2">
                            <button type="button" wire:click="toggleFilter"
                                class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                                <span class="block truncate">{{ $filter == 'all' ? 'Összes' : $filter }}</span>
                                <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>

                            @if ($isFilterOpen)
                                <ul x-cloak wire:click.away="closeFilter" x-show.transition="isFilterOpen"
                                    class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                    tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                                    aria-activedescendant="listbox-option-3">
                                    <li wire:click="$set('filter', 'all')"
                                        class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900"
                                        id="listbox-option-0" role="option">
                                        <span class="block truncate">Összes</span>
                                        @if ($filter === 'all')
                                            <span
                                                class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        @endif
                                    </li>
                                    @foreach ($filters as $day)
                                        <li wire:click="$set('filter', '{{ $day }}')"
                                            class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900"
                                            id="listbox-option-1" role="option">
                                            <span class="block truncate">{{ $day }}</span>
                                            @if ($filter === $day)
                                                <span
                                                    class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>


                    @if ($players->count() == 0)
                        <p class="text-center text-md font-bold uppercase mt-10">Nincs játékos</p>
                    @else
                        <ul role="list" class="divide-y divide-gray-100 flex flex-col gap-y-4">
                            @foreach ($players as $player)
                                <li class="relative py-5 bg-gray-50">
                                    <div class="px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row w-full">
                                        <div class="mx-auto flex max-w-4xl justify-between gap-x-6 w-full">
                                            <div class="flex w-full gap-x-4">
                                                <div
                                                    class="min-w-0 flex flex-col gap-0 md:gap-7 w-full justify-between">
                                                    <div>
                                                        <p class="text-sm font-semibold leading-6 text-gray-900">
                                                        <div class="break-words">
                                                            {{ $player->name }}
                                                        </div>
                                                        </p>
                                                        <p class="mt-1 flex text-xs leading-5 text-gray-500">
                                                        <div class="break-words">
                                                            {{ $player->email }}
                                                            </p>
                                                        </div>
                                                        <p class="mt-1 flex text-xs leading-5 text-gray-500">
                                                        <div class="relative truncate hover:underline">
                                                            {{ $player->created_at }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <p class="sm:hidden mt-1 flex text-xs leading-5 text-gray-500">
                                                    <div class="sm:hidden relative truncate hover:underline">
                                                        <span class="font-bold text-lg">{{ $player->points }}</span>
                                                        pont
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex shrink-0 items-center gap-x-4">
                                                    <div class="hidden sm:flex sm:flex-col sm:items-end">
                                                        <p
                                                            class="text-sm leading-6 text-gray-900 flex items-center gap-2">
                                                            <span
                                                                class="font-bold text-lg">{{ $player->points }}</span>
                                                            pont
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
