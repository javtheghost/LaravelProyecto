
@section('title','Register' )

@extends('layouts.sidebar')

@section('content')
<h1 class="p-2 text-3xl text-center font-bold text-blue-500">Lista de productos</h1>

<div class="flex items-center justify-center block mx-auto my-12 p-10 bg-white w-2/3 border border-gray-200
rounded-lg shadow-lg">


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex items-center justify-end flex-column flex-wrap md:flex-row space-y-2 md:space-y-0 p-3 bg-white dark:bg-gray-900">
        <div >
            <form  method="GET" action="{{ route('products.create') }}">
                <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Agregar
                </button>
            </form>
        </div>

    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Descripción
                </th>
                <th scope="col" class="px-6 py-3">
                    Precio
                </th>
                <th scope="col" class="px-6 py-3">
                    Acción
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-24 h-18 rounded-full p-3" src="{{$producto->image}}" alt="{{$producto->name}}">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{$producto->name}}</div>
                    </div>
                </th>
                <td class="px-6 py-4">
                    {{$producto->description}}
                </td>
                <td class="px-6 py-4">
                    {{$producto->price}}
                </td>



                <td class="px-6 py-4">
                        <div>

                        </div>
                        <a href="{{ route('products.edit', ['id' => $producto->id]) }}" class="focus:outline-none">
                            <button type="button" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                Editar
                            </button>
                        </a>


                        <form id="deleteForm" method="POST" action="{{ route('products.destroy', ['id' => $producto->id]) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="eliminarProducto()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Eliminar
                            </button>
                        </form>

                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                        <script>
                            function eliminarProducto() {
                                Swal.fire({
                                    title: '¿Estás seguro?',
                                    text: "¡No podrás revertir esto!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Sí, eliminarlo',
                                    cancelButtonText: 'Cancelar'

                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        document.getElementById('deleteForm').submit();
                                    }
                                });
                            }
                        </script>



                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    <!-- Agrega la paginación -->
<div class="bg-white px-4 py-3 flex items-center justify-end border-t border-gray-200 sm:px-6">
    {{ $productos->links() }}
</div>
</div>

<script>
    const modal = document.getElementById('modal');

    document.addEventListener('click', function(event) {
        if (event.target.matches('[data-toggle-modal]')) {
            modal.classList.toggle('hidden');
        }
    });

    function deleteProduct() {
        modal.classList.add('hidden');
        // Aquí puedes agregar tu lógica para eliminar el producto
        // Por ejemplo, podrías enviar una solicitud de eliminación al servidor usando fetch
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}'
            });
        @endif
    });
</script>
