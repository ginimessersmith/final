<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resultados de búsqueda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @forelse ($results as $result)
                    <div class="p-6 border-b border-gray-200">
                        {{ $result->nombre }} <!-- Ajusta según tus datos -->
                    </div>
                @empty
                    <p>No se encontraron resultados</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
