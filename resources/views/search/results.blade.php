<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Resultados de búsqueda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @forelse ($results as $result)
                    <p class="pt-3 px-3 hover:text-xl font-bold dark:text-gray-200">{{ $result->nombre }}</p>
                    <p class="px-3 dark:text-gray-300">Precio: {{ $result->precio }} Bs.</p>
                    <p class="px-3 lowercase dark:text-gray-300">Descripcion: {{ $result->descripcion }}</p>
                    <br>
                @empty
                    <p class="dark:text-gray-300">No se encontraron resultados</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
