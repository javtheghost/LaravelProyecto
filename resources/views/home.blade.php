@extends('layouts.app')



@section('content')

@extends('layouts.sidebar')

<h1 class="p-2 text-3xl text-center font-bold text-blue-500">Productos</h1>

<div class="flex items-center justify-center block mx-auto my-12 p-10 bg-white w-2/3 border border-gray-200
rounded-lg shadow-lg">
<div class="p-30 flex flex-wrap items-center justify-center">
    @foreach($productos as $producto)


    <div class="flex-shrink-0 m-6 relative overflow-hidden bg-blue-50 rounded-lg max-w-xs shadow-lg">

        <div class="relative pt-10 px-10 flex items-center justify-center">
            <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3"
                style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
            </div>
            <img class="rounded-lg relative w-40" src="{{ $producto->image }}" alt="{{ $producto->name }}">
        </div>
        <div class="relative text-grey-300 px-6 pb-6 mt-6">
            <div class="flex justify-between">
                <span class="block font-semibold text-grey-500 text-xl">{{$producto->name}}</span>
                <span class="block bg-white rounded-full text-blue-500 text-xs font-bold px-3 py-2 leading-none flex items-center">{{$producto->price}}</span>

            </div>
            <p class="mt-3 text-base text-gray-500">{{$producto->description}}.</p>
        </div>
</div>

@endforeach


</div>

@endsection
