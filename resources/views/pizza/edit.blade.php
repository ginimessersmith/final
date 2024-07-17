<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edición de pizza: {{ $pizza->nombre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('pizzas.update', $pizza->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="px-6 py-4 bg-white dark:bg-gray-700">
                        <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{ $pizza->nombre }}" required class="mt-1 block w-full dark:bg-gray-700 dark:text-gray-900">
                    </div>
                    <div class="px-6 py-4 bg-white dark:bg-gray-700">
                        <label for="precio" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Precio</label>
                        <input type="number" name="precio" id="precio" value="{{ $pizza->precio }}" required class="mt-1 block w-full dark:bg-gray-700 dark:text-gray-900">
                    </div>
                    <div class="px-6 py-4 bg-white dark:bg-gray-700">
                        <label for="categoria_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Categoría</label>
                        <select name="categoria_id" id="categoria_id" required class="mt-1 block w-full dark:bg-gray-700 dark:text-gray-900">
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $pizza->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="px-6 py-4 bg-white dark:bg-gray-700">
                        <label for="tamano_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tamaño</label>
                        <select name="tamano_id" id="tamano_id" required class="mt-1 block w-full dark:bg-gray-700 dark:text-gray-900">
                            @foreach($tamanos as $tamano)
                                <option value="{{ $tamano->id }}" {{ $pizza->tamano_id == $tamano->id ? 'selected' : '' }}>{{ $tamano->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="px-6 py-4 bg-white dark:bg-gray-700">
                        <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Descripción</label>
                        <textarea name="descripcion" id="descripcion" required class="mt-1 block w-full dark:bg-gray-700 dark:text-gray-900">{{ $pizza->descripcion }}</textarea>
                    </div>
                    <div class="px-6 py-4 bg-white dark:bg-gray-700">
                        <label for="foto" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Foto</label>
                        <input type="file" name="foto" id="foto" class="mt-1 block w-full">
                        <p class="mt-2 text-gray-700 dark:text-gray-200">Foto actual:</p>
                        <img src="{{ $pizza->imagen_url }}" alt="{{ $pizza->nombre }}" class="w-40 h-40">
                    </div>
                    <div class="px-6 py-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Actualizar Pizza</button>
                    </div>
                    <x-validation-errors class="mb-4" />
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
