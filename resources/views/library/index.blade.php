@extends('layouts.master')

@section('header')
<hero-section bg-image="{{ $page->image }}"></hero-section>
@endsection

@section('content')
<section class="container mx-auto px-4 py-6">
    <x-section-title :title="$sectionTitle" icon="fas fa-book" class="mb-6 text-primary">
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
        @forelse ($books as $book)
            <div class="w-1/2 p-2">
                <book-card :book='@json($book)'></book-card>
            </div>
        @empty
            <h3 class="w-full p-8 text-center text-4xl">No hay libros para mostrar</h3>
        @endforelse
    </div>

    <div class="text-center">
        {{ $books->links() }}
    </div>
</section>
@endsection
