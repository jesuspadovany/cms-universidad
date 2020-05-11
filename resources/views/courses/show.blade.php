@extends('layouts.master')

@section('header')
    <hero-section bg-image="{{ asset($course->imagen) }}" bg-size="100% 100%"></hero-section>
@endsection

@section('content')
<section class="container mx-auto px-4 py-6">
    {{-- Título del curso --}}
    <x-section-title class="mb-6 font-bold text-6xl text-primary">
        <x-slot name="titleslot">
            <h2 class="capitalize text-6xl">{{ $course->nombre }}</h2>
        </x-slot>
    </x-section-title>

    <div class="text-lg">
        {{-- Info --}}
        <p class="mb-2">
            <b>{{ $course->price_text }}</b> / Profesor(a) {{ $course->profesor }}
        </p>

        {{-- Categorias --}}
        <p class="text-primary">
            @foreach ($course->categories as $category)
                <a href="#" class="capitalize hover:underline">
                    {{ $category->name . (! $loop->last ? ', ' : '') }}
                </a>
            @endforeach
        </p>

        <p class="mt-4">
            <b>Sinópsis:</b> {{ $course->descripcion }}
        </p>
    </div>

    <a href="#" class="btn btn-lg btn-primary-outline my-4 text-lg">
        Reservar entrada
    </a>

</section>
@endsection
