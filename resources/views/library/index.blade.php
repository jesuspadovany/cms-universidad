@extends('layouts.master')

@section('header')
<hero-section bg-image="{{ $page->image }}"></hero-section>
@endsection

@section('content')
<section class="container mx-auto px-4 py-6">
    <x-section-title title="Biblioteca" icon="fas fa-book" class="mb-6 text-primary">
        <a href="#" class="px-3 py-2 rounded-lg border-2 border-primary font-semibold">
            filtrar por
            <i class="fas fa-caret-down"></i>
        </a>
    </x-section-title>

    {{-- Cards --}}
    <div class="flex flex-wrap">
        @foreach ($books as $book)
            <div class="w-1/2 p-2">
                <book-card :book='@json($book)'></book-card>
            </div>
        @endforeach
    </div>

    <div class="text-center">
        <a href="#!" class="inline-block px-16 py-2 bg-primary rounded-md font-semibold text-white">
            Más...
        </a>
    </div>
</section>
@endsection
