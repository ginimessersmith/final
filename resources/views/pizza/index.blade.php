{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menú') }}
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
                <livewire:list-pizzas>
            </div>
        </div>
    </div>
    <p>{{$visits}}</p>
    <x-visits> {{$visits->cant}} </x-visits>
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menú') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (session('success'))
                <div class="bg-green-600 p-2 rounded-lg text-center">
                    <p class="text-white">{{ session('success') }}</p>
                </div>
                @endif


                {{-- <form action="{{ route('pizzas.index') }}" method="GET" class="mb-4">
                    <div class="flex">
                        <input type="text" name="termino" placeholder="Buscar..." class="rounded-l-lg p-2 border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white" value="{{ request('termino') }}">
                        <select name="categoria" class="border-t mr-0 border-b border-gray-200 bg-white text-gray-800">
                            <option value="">Categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        <select name="tamano" class="border-t mr-0 border-b border-gray-200 bg-white text-gray-800">
                            <option value="">Tamaño</option>
                            @foreach($tamanos as $tamano)
                                <option value="{{ $tamano->id }}" {{ request('tamano') == $tamano->id ? 'selected' : '' }}>{{ $tamano->nombre }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded-r-lg">Buscar</button>
                    </div>
                </form> --}}

                <div class="flex justify-between">
                    <h1 class="mt-3 text-2xl font-medium text-gray-900">
                        Menú de pizzas
                    </h1>
                    <a class="m-5 p-2 bg-red-800 hover:bg-red-700 rounded-lg" href="{{ route('pizzas.create') }}">
                        <p class="text-white">+ Nueva pizza</p>
                    </a>
                </div>

                <div class="flex flex-col lg:grid lg:grid-cols-2 lg:grid-rows-5">
                    @forelse ($pizzas as $pizza)
                        <div class="bg-white m-2 rounded-lg flex border">
                            <img src="{{ $pizza->imagen_url }}" class="rounded-l-lg" width="200" alt="{{ $pizza->nombre }}">
                            <div>
                                <a class=" pt-3 px-3 hover:text-xl font-bold hover:cursor-pointer" href="{{ route('pizzas.show', $pizza->id) }}">{{ $pizza->nombre }}</a>
                                <p class=" px-3"><span class="font-bold">Precio:</span> {{ $pizza->precio }} Bs.</p>
                                <p class=" px-3 lowercase">
                                    <span class="font-bold capitalize">Descripción: </span>
                                    {{ $pizza->descripcion }}
                                </p>

                                <a class="m-3 bg-red-800 hover:bg-red-700 p-5 inline-block rounded-lg" href="{{ route('pizzas.show', $pizza->id) }}" >
                                    <div class="flex justify-center">
                                        <p class="text-white">+</p>
                                        <x-car></x-car>
                                    </div>
                                </a>

                                @if (auth()->user()->is_admin)
                                <div class="flex justify-around m-3">
                                    <div class="bg-green-800 p-2 rounded-lg">
                                        <a href="{{ route('pizzas.edit', $pizza->id) }}">
                                            <p class="text-white text-sm uppercase"> Editar </p>
                                        </a>
                                    </div>

                                    <form action="{{ route('pizzas.destroy', $pizza->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-button class="mx-2">
                                            Eliminar
                                        </x-button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="bg-red-700 rounded-lg p-2 text-white">No se encuentran pizzas con esos términos</p>
                    @endforelse
                </div>

                <div class="mt-6">
                    {{ $pizzas->links() }}
                </div>
            </div>
        </div>
    </div>
    <x-visits> {{ $visits->cant }} </x-visits>
</x-app-layout>

