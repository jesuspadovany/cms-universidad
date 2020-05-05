@extends('layouts.master')

@section('header')
<section class="flex items-center justify-center h-full p-6">
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
    <x-section-title :title="ucfirst($book->title)" class="mb-6 font-bold text-primary"></x-section-title>

    {{-- Autor --}}
    <p class="capitalize font-bold">{{ $book->author }}</p>

    {{-- Categorias --}}
    <p>
        @foreach ($book->categories as $cat)
            <a href="#" class="capitalize text-primary">
                {{ $cat->name . (! $loop->last ? ', ' : '') }}
            </a>
        @endforeach
    </p>

    {{-- Sinopsis --}}
    <p class="mt-4">
        <b>Sinopsis:</b>
        {{ $book->description }}
    </p>
</section>
@endsection
