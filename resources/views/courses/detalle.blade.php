@extends('layouts.master')

@section('header')
    {{-- <hero-section bg-image="{{ asset($cursos[0]->imagen) }}"></hero-section> --}}
    <hero-section bg-image="{{ asset('images/curso-show.png') }}" bg-size="100% 100%"></hero-section>
@endsection

@section('content')
<section class="container mx-auto px-4 py-6">
    {{-- Título del curso --}}
    <x-section-title class="mb-6 font-bold text-6xl text-primary">
        <x-slot name="titleslot">
            <h2 style="font-size: 5rem">Volver a casa</h2>
        </x-slot>
    </x-section-title>

    <div class="text-lg">
        <p class="text-primary">Categoria</p>

        <p class="mt-4">
            <b>Sinópsis:</b> Bienvenidos a este curso en el que aprenderemos como convertirnos en verdaderes artistas utilizando nuestras manos, nuestro cerebro y algunas herramientas básicas. Además, aprenderemos a crear personajes, a utilizarlos colores, a dibujar, a fotografiar y a hacer volar nuestra imaginación los más alto y lo más lejos que podamos.
        </p>
    </div>

    <a href="#" class="btn btn-primary-outline py-1 my-4">
        Reservar entrada
    </a>

    {{-- <h4 class="text-primary text-5xl"><i class="fab fa-leanpub"></i> {{ $cursos[0]->nombre }}</h4>
    <hr class="bg-primary">
    <div>
        <h4 class="text-primary text-4xl">Descripción del curso</h4>
        <h6>{{ $cursos[0]->descripcion_curso }}</h6>
        <h4 class="text-primary text-4xl">Descripcion general</h4>
        <h6>{{ $cursos[0]->descipcion }}</h6>
        <h4 class="text-primary text-4xl">Ubicacion</h4>
        <h6>{{ $cursos[0]->ubicacion }}</h6>
        <h4 class="text-primary text-4xl">Anfitrion</h4>
        <h6>{{ $cursos[0]->anfitrion }}</h6>
        <h4 class="text-primary text-4xl">Profesor</h4>
        <h6>{{ $cursos[0]->profesor }}</h6>
        <h4 class="text-primary text-4xl">Tipo de clase</h4>
        <h6>{{ $cursos[0]->clase }}</h6>
        <h4 class="text-primary text-4xl">Precio</h4>
        <h6>{{ $cursos[0]->precio }}</h6>
    </div>        --}}

</section>
@endsection
