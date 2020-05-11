@extends('layouts.master')

@section('header')
<section class="flex items-center justify-center h-full p-6 bg-gray-200">
    <img
        src="{{ asset($book->image) }}"
        alt="Portada de {{ $book->title }}"
        class="book__cover"
    />
</section>
@endsection

@section('content')
<section class="container mx-auto px-4 py-6">
    {{-- Título del libro --}}
    <x-section-title class="mb-6 font-bold text-6xl text-primary">
        <x-slot name="titleslot">
            <h2 class="text-6xl">{{ $book->title }}</h2>
        </x-slot>
    </x-section-title>

    <div class="text-lg">
        {{-- Info --}}
        <p class="mb-2">
            <b>{{ $book->price_text }}</b> / {{ $book->published_at->format('Y') }} / {{ $book->author }}
        </p>

        {{-- Categorias --}}
        <p class="text-primary">
            @foreach ($book->categories as $category)
                <a href="{{ route('library.indexByCategory', ['category' => $category->slug]) }}" class="capitalize hover:underline">
                    {{ $category->name . (! $loop->last ? ', ' : '') }}
                </a>
            @endforeach
        </p>

        {{-- Sinopsis --}}
        <p class="mt-4">
            <b>Sinopsis:</b> {{ $book->synopsis }}
        </p>
    </div>

    <a href="#" class="btn btn-lg btn-primary-outline my-4 text-lg">
        {{ $book->button_text }}
    </a>
</section>
@endsection
