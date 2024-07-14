{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (session('success'))
                <div class="bg-green-600 p-2 rounded-lg text-center">
                    <p class="text-white">{{session('success')}}</p>
                </div>
                @endif
                <livewire:list-clientes>
            </div>
        </div>
    </div>
    <x-visits> {{$visits->cant}} </x-visits>
</x-app-layout> --}}

<!-- resources/views/cliente/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (session('success'))
                    <div class="bg-green-600 p-2 rounded-lg text-center">
                        <p class="text-white">{{session('success')}}</p>
                    </div>
                @endif

                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <h1 class="mt-3 text-2xl font-medium text-gray-900">
                            Clientes
                        </h1>
                    </div>

                    <div class="flex flex-col lg:grid lg:grid-cols-2 lg:grid-rows-5">
                        @forelse ($clientes as $cliente)
                            <div class="bg-white m-2 rounded-lg flex border justify-between">
                                <div>
                                    <p class=" pt-3 px-3 hover:text-xl font-bold">{{$cliente->user->name}}</p>
                                    <p class=" px-3">Correo: {{$cliente->user->email}}</p>
                                    <p class=" px-3">Teléfono: {{$cliente->numeroTelf}}</p>
                                    <p class=" px-3">
                                        <span class="font-bold">Dirección: </span>
                                        {{$cliente->direccion}}
                                    </p>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <form action="{{route('clientes.destroy', $cliente->user->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-button class="mx-2">
                                            Eliminar
                                        </x-button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="bg-red-700 rounded-lg text-3xl text-white">No hay clientes registrados.</p>
                        @endforelse
                    </div>

                    <div class="mt-6">
                        {{$clientes->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-visits> {{$visits->cant}} </x-visits>
</x-app-layout>
