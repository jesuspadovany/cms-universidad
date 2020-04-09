@extends('admin.layouts.master')

@section('content')
<section class="p-4">
    @if ($alert = session('alert'))
        <alert
            class="mb-2"
            :type='@json($alert['type'])'
            :message='@json($alert['message'])'
        ></alert>
    @endif

     {{-- Seccion con imagen principal --}}
    <div class="flex mb-6">
        <div class="w-1/2">
            <div class="flex items-center justify-between mb-4">
                <p class="text-xl">Imagen principal</p>
                <a href="{{ route('admin.courses.changePageImage') }}" class="px-2 py-1 rounded-md bg-primary font-semibold text-white">Cambiar imagen</a>
            </div>
            <img src="{{ asset($page->image) }}">
        </div>
        <div class="flex flex-col items-end justify-center w-1/2 text-right">
            <a href="#!" class="px-4 py-3 mb-6 bg-primary rounded font-semibold text-white text-xl">Agregar curso</a>
            <a href="#" class="px-4 py-3 mb-6 bg-primary rounded font-semibold text-white text-xl">Filtros</a>
            <a href="#" class="px-4 py-3 border-2 border-primary rounded text-primary text-xl">
                Filtrar por
                <i class="fas fa-caret-down"></i>
            </a>
        </div>
    </div>

    {{-- Separador --}}
    <div class="h-4 bg-primary"></div>

    {{-- Orden en el slider --}}
    <div class="flex items-center my-4">
        <p class="font-semibold text-primary text-lg">Orden en el slider</p>
        <a href="#!" class="ml-auto text-primary hover:underline">Editar</a>
    </div>

    {{-- Slides --}}
    {{-- <book-slider
        :items='@json($booksInSlider)'
        :number-of-cols="2"
        :number-of-rows="2"
    ></book-slider> --}}

    {{-- Separador --}}
    <div class="h-4 bg-primary my-4"></div>

    <h3 class="mb-4 font-semibold text-primary text-xl">Cursos</h3>
</section>
@endsection
