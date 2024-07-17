<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todos los pedidos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @if (session('success'))
                    <div class="bg-green-600 dark:bg-green-700 p-2 rounded-lg text-center">
                        <p class="text-white">{{ session('success') }}</p>
                    </div>
                @endif

                <div class="p-6 lg:p-8 bg-white dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                    <div class="flex justify-between">
                        <h1 class="mt-3 text-2xl font-medium text-gray-900 dark:text-gray-200">
                            Todos los pedidos
                        </h1>
                        @if (session('alert'))
                            <div class="flex items-center bg-green-500 dark:bg-green-600 text-white text-sm font-bold px-4 py-3" role="alert">
                                <p>{{ session('alert') }}</p>
                            </div>
                        @endif
                    </div>

                    <div class="flex flex-col">
                        @forelse ($pedidos as $pedido)
                            <div class="border rounded-lg p-2 dark:border-gray-600">
                                <p class="text-xl font-bold mt-5 dark:text-gray-200">Pedido #{{ $pedido->id }}</p>
                                <p class="px-3 dark:text-gray-300"><span class="font-bold">Cliente:</span> {{ $pedido->cliente->user->name ?? $pedido->nombre }}</p>
                                <p class="px-3 dark:text-gray-300"><span class="font-bold">Estado del pago:</span> {{ $pedido->pagoestado->nombre }}</p>
                                <p class="px-3 dark:text-gray-300"><span class="font-bold">Estado pedido:</span> {{ $pedido->estado->nombre }}</p>
                                <p class="px-3 dark:text-gray-300"><span class="font-bold">Total:</span> {{ $pedido->total }} Bs.</p>
                                <p class="px-3 dark:text-gray-300"><span class="font-bold">Método de pago:</span> {{ $pedido->metodoPago->nombre }} Bs.</p>
                                <p class="px-3 lowercase flex flex-col dark:text-gray-300">
                                    <span class="font-bold capitalize">Descripción: </span>
                                    @foreach ($pedido->detalles as $detalle)
                                        <div class="flex justify-between w-1/2 mb-3">
                                            <p class="px-3"><span class="font-bold">Pizza:</span> {{ $detalle->pizza->nombre }}</p>
                                            <p class="px-3"><span class="font-bold">Cantidad:</span> {{ $detalle->cantidad }}</p>
                                        </div>
                                    @endforeach
                                </p>
                                <form action="{{ route('pedidos.markAsSent', $pedido->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-blue-500 dark:bg-blue-600 hover:bg-blue-700 dark:hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                                        Marcar como enviado
                                    </button>
                                </form>
                            </div>
                        @empty
                            <p class="p-2 bg-green-700 dark:bg-green-800 text-white text-sm rounded-lg">No hay pedidos disponibles</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
