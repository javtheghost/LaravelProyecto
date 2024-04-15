@extends('layouts.sidebar')

@section('title', 'Editar Producto')


<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">
    <h1 class="text-3xl text-center font-bold">Editar Producto</h1>

    <form method="POST" action="{{ route('products.update', ['id' => $producto->id]) }}">
        @csrf
        @method('PUT')

        <div class="grid gap-6 mb-6 md:grid-cols-2 p-2 mr-15 ml-15">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $producto->name }}" />
                @error('name')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                    text-red-600 p-2 my-2">* {{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                <input type="text" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $producto->price }}" />
                @error('price')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                    text-red-600 p-2 my-2">* {{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid gap-6 mb-6 md:grid-cols-1">
            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                <textarea id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 resize-y h-20 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $producto->description }}"></textarea>
                @error('description')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                    text-red-600 p-2 my-2">* {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
                <textarea id="image" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 resize-y h-40 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $producto->image }}"></textarea>
                @error('image')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                    text-red-600 p-2 my-2">* {{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">

            <a href="{{ route('home') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</a>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Actualizar
            </button>
            </div>
    </form>

</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var inputPrecio = document.getElementById('price');

        inputPrecio.addEventListener('input', function() {
            // Eliminar cualquier caracter que no sea un dígito numérico o un punto decimal
            var cleanedValue = inputPrecio.value.replace(/[^0-9.]/g, '');

            // Si hay más de un punto decimal, eliminar todos excepto el primero
            var decimalCount = (cleanedValue.match(/\./g) || []).length;
            if (decimalCount > 1) {
                cleanedValue = cleanedValue.replace(/\.(?=.*\.)/g, '');
            }

            // Agregar el prefijo "$" al campo de entrada
            inputPrecio.value = '$' + cleanedValue;
        });
    });
</script>
