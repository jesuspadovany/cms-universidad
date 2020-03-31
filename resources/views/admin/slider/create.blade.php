@extends('admin.layouts.master')

@section('section-title', 'Slider Principal')

@section('content')
<section class="p-4">
    <div class="p-6">
        <div class="flex items-center mb-5">
            <label for="titulo" class="w-1/4">Título de imagen</label>
            <input
                type="text"
                name="titulo"
                id="titulo"
                placeholder="Título de imagen"
                class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
            >
        </div>
        <div class="flex items-center mb-5">
            <label for="titulo" class="w-1/4">Descripción de imagen</label>
            <input
                type="text"
                name="titulo"
                placeholder="Descripción de imagen"
                class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
            >
        </div>
        <div class="flex items-center mb-5">
            <label for="titulo" class="w-1/4">Asignar posición</label>
            <input
                type="text"
                name="titulo"
                id="titulo"
                placeholder="Asignar posición"
                class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
            >
        </div>

        <div class="text-center">
            <a href="#" class="inline-block px-5 py-2 rounded-md bg-primary font-semibold text-white mr-6">
                Agregar imagen
            </a>
            <a href="#" class="inline-block px-5 py-2 rounded-md bg-primary font-semibold text-white mb-6">
                Eliminar imagen
            </a>
            <div>
                <img src="https://via.placeholder.com/500x220" class="inline-block">
            </div>
        </div>

        <div class="text-right mt-6">
            <a href="#" class="inline-block px-6 py-3 rounded-md bg-primary font-semibold text-white mr-6">
                Guardar
            </a>
        </div>
    </div>

    <div class="h-4 my-6 bg-primary"></div>

    <div class="flex flex-wrap">
        @foreach (range(1, 5) as $i)
            <div class="w-1/3 p-2">
                <img src="https://via.placeholder.com/340x150" class="block w-full h-40">
            </div>
        @endforeach
    </div>
</section>
@endsection
