@extends('layouts.master')

@section('header')
<hero-section bg-image="{{ $page->image }}" bg-size="100% 100%"></hero-section>
@endsection

@section('content')
<section class="container mx-auto px-4 py-6">
    {{-- Título --}}
	<x-section-title class="mb-6 text-primary">
        <x-slot name="titleslot">
            <h2 class="flex items-center text-5xl">
                <img src="{{ asset('images/library-icon-red.png') }}" alt="Biblioteca" class="inline-block w-12 h-12 mr-4">
                {{ $sectionTitle }}
            </h2>
        </x-slot>

		{{-- Filtros --}}
        <filters :active='@json($filtered)'>
            @foreach ($categories as $category)
                <li>
                    <a
                        href="{{ route('library.indexByCategory', ['category' => $category->slug]) }}"
                        class="filters__link"
                    >
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </filters>
	</x-section-title>

    {{-- Cards --}}
    <div class="flex flex-wrap">
        @forelse ($bookCards as $card)
            <div class="w-1/2 p-2">
                <book-card :card='@json($card->getCardWithAccesors())'></book-card>
            </div>
        @empty
            <h3 class="w-full p-8 text-center text-4xl">No hay libros para mostrar</h3>
        @endforelse
    </div>

    <div class="mt-4 text-center">
        {{ $bookCards->links() }}
    </div>
</section>
@endsection
