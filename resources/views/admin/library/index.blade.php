@extends('admin.layouts.master')

@section('section-title', 'Biblioteca')

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
            <p class="mb-4 text-xl">Imagen principal</p>
            <img src="https://via.placeholder.com/500x250">
        </div>
        <div class="flex flex-col items-end justify-center w-1/2 text-right">
            <a href="{{ route('admin.library.create') }}" class="px-4 py-3 mb-6 bg-primary rounded font-semibold text-white text-xl">Agregar +</a>
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
        <a href="{{ route('admin.library.slider') }}" class="ml-auto text-primary hover:underline">Editar</a>
    </div>

    {{-- Slides --}}
    <book-slider
        :items='@json($booksInSlider)'
        :number-of-cols="2"
        :number-of-rows="2"
    ></book-slider>
</section>
@endsection
