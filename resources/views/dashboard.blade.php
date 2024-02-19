<x-app-layout>
    <x-slot name="header" class="bg-slate-900">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Todos los coches' }}
        </h2>
    </x-slot>
    <div class="m-20">

        @if (session('status'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="font-medium">INFO</span> {{ session('status') }}
            </div>
        @endif

        <div>
            @livewire('car-form', ['nombre' => Auth::user()->name])
        </div>

    </div>
</x-app-layout>
