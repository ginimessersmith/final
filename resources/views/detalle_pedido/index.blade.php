{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Carrito de compras') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <livewire:show-cart>
            </div>
        </div>
    </div>

</x-app-layout> --}}

<!-- resources/views/detalle_pedido/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Carrito de compras') }}
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
                    <div class="bg-gray-200 dark:bg-gray-700 rounded-lg">
                        <table class="w-full">
                            <thead>
                                <tr class="text-gray-800 dark:text-gray-200">
                                    <th class="px-3 py-3 ">Pizza</th>
                                    <th class="px-3 py-3 ">Cantidad</th>
                                    <th class="px-3 py-3 ">Precio Unitario</th>
                                    <th class="px-3 py-3 ">Subtotal</th>
                                    <th class="px-3 py-3 ">Opciones</th>
                                </tr>
                            </thead>
                            @foreach ($detalles as $detalle)
                            <tbody>
                                <tr class="border-t border-gray-200 dark:border-gray-600">
                                    <td class="px-6 py-4 text-center">{{$detalle->Pizza->nombre}}</td>
                                    <td class="px-6 py-4 text-center">{{$detalle->cantidad}}</td>
                                    <td class="px-6 py-4 text-center">{{$detalle->Pizza->precio}} Bs.</td>
                                    <td class="px-6 py-4 text-center">{{$detalle->subtotal}} Bs.</td>
                                    <td class="px-6 py-4 text-center">
                                        <form action="{{ route('detalle_pedido.delete', $detalle->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="mt-8 flex justify-between">
                        <div class="bg-gray-200 dark:bg-gray-700 p-3 rounded-lg">
                            <p>
                                <span class="font-bold text-gray-800 dark:text-gray-200">Total: </span>
                                <span class="text-gray-800 dark:text-gray-200">{{$total}} Bs.</span>
                            </p>
                        </div>

                        @if($detalles != [])
                        <div class="p-3">
                            <form action="{{ route('detalle_pedido.checkout') }}" method="POST">
                                @csrf
                                <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                                <button class="bg-green-800 dark:bg-green-900 p-2 text-white rounded-lg hover:bg-green-600 dark:hover:bg-green-700">
                                    Realizar pedido
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                    @if (isset($QR))
                    <div class="flex justify-center">
                        <img src="{{$QR}}" alt="">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


