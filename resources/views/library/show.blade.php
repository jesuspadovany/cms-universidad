@extends('layouts.master')

@section('header')
<section class="flex items-center justify-center h-full p-6 bg-gray-200">
    <img
        src="{{ asset($book->image) }}"
        alt="Portada de {{ $book->name }}"
        class="book__cover"
    />
</section>
@endsection

@section('content')
<section class="container mx-auto px-4 py-6">
    {{-- Título del libro --}}
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
        Descargar
    </a>

    {{-- Autor --}}
    {{-- <p class="capitalize font-bold">{{ $book->author }}</p> --}}

    {{-- Categorias --}}
    {{-- <p>
        @foreach ($book->categories as $cat)
            <a href="#" class="capitalize font-semibold text-primary">
                {{ $cat->name . (! $loop->last ? ', ' : '') }}
            </a>
        @endforeach
    </p> --}}

    {{-- Sinopsis --}}
    {{-- <p class="my-4">
        <b>Sinópsis:</b>
        {{ $book->description }}
    </p> --}}

    {{-- <a href="#" class="btn btn-primary-outline py-1">
        {{ $book->button_text }}
    </a> --}}
</section>
@endsection
