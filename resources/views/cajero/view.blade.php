{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pedidos para atender') }}
        </h2>
    </x-slot>
    <!-- Be present above all else. - Naval Ravikant -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:list-pedidos>
            </div>
        </div>
    </div>

</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pedidos para atender') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <h1 class="mt-3 text-2xl font-medium text-gray-900">
                            En preparación
                        </h1>
                        @if (session('alert'))
                        <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                            <p>{{ session('alert') }}</p>
                        </div>
                        @endif
                    </div>

                    <div class="flex flex-col">
                        @forelse ($pedidos as $pedido)
                        <div class="border rounded-lg p-2">
                            <p class="text-xl font-bold mt-5">Pedido #{{ $pedido->id }}</p>
                            <p class=" px-3"><span class="font-bold">Cliente:</span> {{ $pedido->cliente->user->name }}</p>
                            <p class=" px-3"><span class="font-bold">Total:</span> {{ $pedido->total }} Bs.</p>
                            <p class=" px-3"><span class="font-bold">Método de pago:</span> {{ $pedido->metodoPago->nombre }} Bs.</p>
                            <p class=" px-3 lowercase flex flex-col">
                                <span class="font-bold capitalize">Descripción: </span>
                                @foreach ($pedido->detalles as $detalle)
                                <div class="flex justify-between w-1/2 mb-3">
                                    <p class="px-3"><span class="font-bold">Pizza:</span>{{ $detalle->pizza->nombre }}</p>
                                    <p class="px-3"><span class="font-bold">Cantidad:</span>{{ $detalle->cantidad }}</p>
                                </div>
                                @endforeach
                            </p>

                            @if (auth()->user()->is_cajero)
                                <form action="{{ route('pedidos.markAsSent', $pedido->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg ">
                                        Marcar envío
                                    </button>
                                </form>
                            @endif

                        </div>
                        @empty
                            <p class="bg-red-700 rounded-lg p-2 text-white">No hay pedidos en preparación</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

