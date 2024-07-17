{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pedir pizza') }}
        </h2>
        <p>
            {{ $pizza->nombre }}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <livewire:show-pizza :pizza="$pizza">
            </div>
        </div>
    </div>
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pedir pizza') }}
        </h2>
        <p class="dark:text-gray-400">
            {{ $pizza->nombre }}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                    <div class="bg-white dark:bg-gray-700 m-2 rounded-lg flex border dark:border-gray-600">
                        <img src="{{ $pizza->imagen_url }}" class="rounded-l-lg" width="500" alt="{{ $pizza->nombre }}">
                        <div class="flex flex-col justify-center">
                            <p class="pt-3 px-3 text-xl font-bold">{{ $pizza->nombre }}</p>
                            <p class="px-3"><span class="font-bold">Precio:</span> {{ $pizza->precio }} Bs.</p>
                            <p class="px-3 lowercase">
                                <span class="font-bold capitalize">Descripción: </span>
                                {{ $pizza->descripcion }}
                            </p>

                            {{-- formulario para cantidad de compra --}}
                            <form action="{{ route('pizzas.addToCart', $pizza->id) }}" method="POST" class="px-3 mt-5">
                                @csrf
                                <x-label for="cantidad" value="{{ __('Cantidad') }}"/>
                                <x-input type="number" name="cantidad" id="cantidad" min="1" value="1"  class="dark:bg-gray-900 dark:text-gray-200"/>
                                <x-button>
                                    Agregar al carrito
                                </x-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
