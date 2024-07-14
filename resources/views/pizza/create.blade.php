{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nueva pizza') }}
        </h2>
        <p>
            Registrar nueva pizza para el menú del local.
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:form-pizzas>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nueva pizza') }}
        </h2>
        <p>
            Registrar nueva pizza para el menú del local.
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('pizzas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="px-6 py-4">
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="nombre" id="nombre" required class="mt-1 block w-full">
                    </div>
                    <div class="px-6 py-4">
                        <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                        <input type="number" name="precio" id="precio" required class="mt-1 block w-full">
                    </div>
                    <div class="px-6 py-4">
                        <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                        <select name="categoria_id" id="categoria_id" required class="mt-1 block w-full">
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="px-6 py-4">
                        <label for="tamano_id" class="block text-sm font-medium text-gray-700">Tamaño</label>
                        <select name="tamano_id" id="tamano_id" required class="mt-1 block w-full">
                            @foreach($tamanos as $tamano)
                                <option value="{{ $tamano->id }}">{{ $tamano->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="px-6 py-4">
                        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                        <textarea name="descripcion" id="descripcion" required class="mt-1 block w-full"></textarea>
                    </div>
                    <div class="px-6 py-4">
                        <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                        <input type="file" name="foto" id="foto" required class="mt-1 block w-full">
                    </div>
                    <div class="px-6 py-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Crear Pizza</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
