@extends('layouts.master')

@section('header')
<hero-section bg-image="{{ $page->image }}" bg-size="100% 100%"></hero-section>
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
        {{-- @forelse ($books as $book)
            <div class="w-1/2 p-2">
                <book-card :book='@json($book)'></book-card>
            </div>
        @empty
            <h3 class="w-full p-8 text-center text-4xl">No hay libros para mostrar</h3>
        @endforelse --}}
        @foreach (range(1, 10) as $i)
        <div class="w-1/2 p-2">
            <div class="bg-gray-300 rounded-lg overflow-hidden">
            <!-- Body -->
            <div class="flex h-56">
              <!-- Image -->
              <div class="flex-shrink-0 flex w-40 p-3 bg-gray-400">
                <a href="#" class="block w-full h-full">
                  <img src="{{ asset('images/book-default-image.png') }}" class="block h-full w-full" style="box-shadow: 3px 3px 3px rgba(0, 0, 0, .4);">
                </a>
              </div>

              <!-- Content -->
              <div class="p-4 w-full text-sm">
                <!-- Nombre del libro -->
                <h3 class="mb-3 leading-none capitalize text-2xl">
                  <a href="#">
                    Somos nuestro cerebro
                  </a>
                </h3>

                <p>
                    <b>Ensayo de divulgación cientifica</b>
                </p>
                <p>
                    Rosario Bléfari y Susana Pampín sobre textos de Sergio Strejilevich / 2003 / 64 páginas
                </p>

                <p class="mt-3">
                    Los nuevos paradigmas científicos son un mapa desde donde volver a descubrir el mundo, ya que bajo los ojos de la ciencia nuestro universo interno se extiende y alcanza dimensiones que lo reconcilian con la naturaleza.
                </p>
              </div>
            </div>
            <!-- Footer -->
            <div class="flex px-3 py-2 bg-primary font-semibold text-white">
              <span>Gratis</span>

              <a href="#" class="ml-auto">
                Leer
              </a>
            </div>
          </div>
        </div>
        @endforeach
    </div>

    <div class="text-center">
        {{ $books->links() }}
    </div>
</section>
@endsection
