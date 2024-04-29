<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Nyereményjáték sorsolás') }}
            </h2>
            <div class="flex gap-10 mt-7">
                <a href="{{ route('draw.index') }}">Sorsolás</a>
                <a href="{{ route('draw.gamers') }}">Játékosok</a>
            </div>
        </div>
    </x-slot>

    <livewire:draw/>
</x-app-layout>
