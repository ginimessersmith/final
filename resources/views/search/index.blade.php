<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Resultados de búsqueda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Ajustes de estilo para modo oscuro en cada contenedor principal -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @if (session('success'))
                    <div class="bg-green-600 dark:bg-green-700 p-2 rounded-lg text-center">
                        <p class="text-white">{{session('success')}}</p>
                    </div>
                @endif
                <!-- Secciones repetitivas para usuarios, pizzas, categorías, tamaños, métodos de pago y estados -->
                @foreach (['usuarios' => $users, 'pizzas' => $pizzas, 'categorias' => $categorias, 'tamanos' => $tamanos, 'metodopagos' => $metodopagos, 'estados' => $estados] as $section => $items)
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg m-5">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight m-5">
                        {{ __(ucfirst($section)) }}
                    </h2>
                    @forelse ($items as $item)
                    <div class="bg-white dark:bg-gray-700 m-2 rounded-lg flex border dark:border-gray-600 justify-between">
                        <div>
                            <p class="pt-3 px-3 hover:text-xl font-bold dark:text-gray-200">{{ $item->nombre }}</p>
                            @if (isset($item->precio))
                                <p class="px-3 dark:text-gray-300">Precio: {{ $item->precio }} Bs.</p>
                            @endif
                            @if (isset($item->descripcion))
                                <p class="px-3 lowercase dark:text-gray-300">Descripcion: {{ $item->descripcion }}</p>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="p-2 bg-gray-200 dark:bg-gray-700">
                        <p class="dark:text-gray-300">Sin resultados</p>
                    </div>
                    @endforelse
                    <div class="mt-6 px-3 py-2">
                        {{ $items->links() }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
