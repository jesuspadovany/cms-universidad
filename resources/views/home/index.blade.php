@extends('layouts.master')

@section('header')
	<main-slider :slides='@json($slides)'></main-slider>
@endsection

@section('content')
{{-- Sección de agenda --}}
<section class="container mx-auto px-4 py-6">
	{{-- Título --}}
	<x-section-title class="mb-6 text-primary">
        <x-slot name="titleslot">
            <h2 class="flex items-center text-5xl">
                <img src="{{ asset('images/agenda-icon-red.png') }}" alt="Agenda" class="inline-block w-12 h-12 mr-4">
                Agenda
            </h2>
        </x-slot>
		<a href="#" class="btn btn-primary-outline">
			Ver agenda por día
		</a>
	</x-section-title>

	{{-- Cards de agendas --}}
	<div class="grid grid-cols-4 grid-rows-2 gap-6">
        @foreach (range(1, 2) as $i)
            {{-- Volver a casa --}}
            <div>
                <img src="{{ asset('images/agenda-default-image.png') }}" class="inline-block h-48 w-full">
                <div class="flex flex-col h-48 bg-gray-800 text-white text-sm">
                    <div class="flex flex-col h-full px-4 py-3">
                        <h3 class="text-2xl">Volver a casa</h3>

                        <span class="mt-auto text-red-600 font-semibold">Exposición</span>
                        <p>Entrada libre</p>
                        <p>Fotografias de Enrique X</p>
                    </div>
                    <div class="px-3 py-2 bg-red-600 text-right font-semibold">
                        04/08 al 30/08 de 10h a 23h
                    </div>
                </div>
            </div>

            {{-- Renacer en abril --}}
            <div>
                <img src="{{ asset('images/renacer.png') }}" class="inline-block h-48 w-full">
                <div class="flex flex-col h-48 bg-gray-800 text-white text-sm">
                    <div class="flex flex-col h-full px-4 py-3">
                        <h3 class="text-2xl">Renacer en abril</h3>

                        <span class="mt-auto font-semibold"  style="color: #f68d62">Teatro</span>
                        <p>Entradas desde $150</p>
                        <p>Dirección: Alicia Moreau</p>
                    </div>
                    <div class="px-3 py-2 text-right font-semibold" style="background-color: #f68d62">
                        Viernes de Agosto 19:00
                    </div>
                </div>
            </div>

            {{-- Curso de arte digital --}}
            <div>
                <img src="{{ asset('images/arte-digital.png') }}" class="inline-block h-48 w-full">
                <div class="flex flex-col h-48 bg-gray-800 text-white text-sm">
                    <div class="flex flex-col h-full px-4 py-3">
                        <h3 class="text-2xl">Curso de arte digital</h3>

                        <span class="mt-auto font-semibold"  style="color: #91c555">Cursos</span>
                        <p>10 clases semanales</p>
                        <p>Profesor Eugenio Alba</p>
                    </div>
                    <div class="px-3 py-2 text-right font-semibold"  style="background-color: #91c555">
                        13:30 / 18:30
                    </div>
                </div>
            </div>

            {{-- Los arcanos del desierto --}}
            <div>
                <img src="{{ asset('images/arcanos.png') }}" class="inline-block h-48 w-full">
                <div class="flex flex-col h-48 bg-gray-800 text-white text-sm">
                    <div class="flex flex-col h-full px-4 py-3">
                        <h3 class="text-2xl">Los arcanos del desierto</h3>

                        <span class="mt-auto font-semibold"  style="color: #F15C5E">Música en vivo</span>
                        <p>Sacá tu entrada gratuita</p>
                        <p>Sala 4</p>
                    </div>
                    <div class="px-3 py-2 text-right font-semibold"  style="background-color: #F15C5E">
                        El sabado 6/8 a las 21:30
                    </div>
                </div>
            </div>
        @endforeach
	</div>
</section>

{{-- Sección de cursos --}}
<section class="text-white" style="background-color: #3c3c3c">
	<div class="container mx-auto px-4 py-6">
		{{-- Título --}}
		<x-section-title class="mb-6">
            <x-slot name="titleslot">
                <h2 class="flex items-center text-5xl">
                    <img src="{{ asset('images/cursos-icon-white.png') }}" alt="Cursos y actividades" class="inline-block w-12 h-12 mr-4">
                    Cursos y actividades
                </h2>
            </x-slot>

			<a href="#" class="ml-auto px-3 py-2 rounded-lg border-2 border-white font-semibold hover:no-underline">
				Filtrar por temática
			</a>
		</x-section-title>

		{{-- Cards Slider--}}
		<div class="grid grid-cols-4 grid-rows-1 gap-6">
            {{-- Percusión --}}
            <div>
                <img src="{{ asset('images/percusion.png') }}" class="inline-block h-64 w-full">
                <div class="flex flex-col h-40 bg-white text-gray-800 text-sm">
                    <div class="flex flex-col h-full px-4 py-3">
                        <h3 class="text-2xl">Percusión</h3>

                        <p class="mt-auto">
                            A cargo del grupo Maruma todos los viernes a las 19
                            nivel inicial e intermedio. <b>Incribte gratis</b>
                        </p>
                    </div>
                    <div class="px-3 py-2 font-semibold text-right text-xl text-white" style="background-color: #8060a6;">
                        <a href="#">Ver +</a>
                    </div>
                </div>
            </div>

            {{-- Teatro para chicos --}}
            <div>
                <img src="{{ asset('images/teatro.png') }}" class="inline-block h-64 w-full">
                <div class="flex flex-col h-40 bg-white text-gray-800 text-sm">
                    <div class="flex flex-col h-full px-4 py-3">
                        <h3 class="text-2xl">Teatro para chicos</h3>

                        <p class="mt-auto">
                            Taller de de teatro y expresión para chicos de 4 a 12. Música, baile y diversión en el cosmos
                        </p>
                    </div>
                    <div class="px-3 py-2 font-semibold text-right text-xl text-white" style="background-color: #f68d62;">
                        <a href="#">Ver +</a>
                    </div>
                </div>
            </div>

            {{-- Fotografía --}}
            <div>
                <img src="{{ asset('images/fotografia.png') }}" class="inline-block h-64 w-full">
                <div class="flex flex-col h-40 bg-white text-gray-800 text-sm">
                    <div class="flex flex-col h-full px-4 py-3">
                        <h3 class="text-2xl">Fotografía</h3>

                        <p class="mt-auto">
                            Clase maestra de foto digital por Angela Bass. Todos los dias de 9 a 22 en la sala 7.
                        </p>
                    </div>
                    <div class="px-3 py-2 font-semibold text-right text-xl text-white" style="background-color: #F15C5E;">
                        <a href="#">Ver +</a>
                    </div>
                </div>
            </div>

            {{-- Fotografía --}}
            <div>
                <img src="{{ asset('images/fotografia.png') }}" class="inline-block h-64 w-full">
                <div class="flex flex-col h-40 bg-white text-gray-800 text-sm">
                    <div class="flex flex-col h-full px-4 py-3">
                        <h3 class="text-2xl">Fotografía</h3>

                        <p class="mt-auto">
                            Clase maestra de foto digital por Angela Bass. Todos los dias de 9 a 22 en la sala 7.
                        </p>
                    </div>
                    <div class="px-3 py-2 font-semibold text-right text-xl text-white" style="background-color: #F15C5E;">
                        <a href="#">Ver +</a>
                    </div>
                </div>
            </div>
		</div>

		<div class="mt-12 mb-6 text-3xl text-center text-white">
			<a href="#">Arte</a> |
			<a href="#">Música</a> |
			<a href="#">Teatro</a> |
			<a href="#">Pintura</a> |
			<a href="#">Fotografía</a> |
			<a href="#">Escritura</a> |
			<a href="#">Cine</a> |
			<a href="#">Diseño</a>
		</div>
	</div>
</section>

{{-- Sección de biblioteca --}}
<section class="container mx-auto px-4 py-6">
	{{-- Título --}}
	<x-section-title class="mb-6 text-primary">
        <x-slot name="titleslot">
            <h2 class="flex items-center text-5xl">
                <img src="{{ asset('images/library-icon-red.png') }}" alt="Biblioteca" class="inline-block w-12 h-12 mr-4">
                Biblioteca
            </h2>
        </x-slot>

		{{-- <a href="{{ route('library.index') }}" class="ml-auto px-3 py-2 rounded-lg border-2 border-primary font-semibold"> --}}
		<a href="{{ route('library.index') }}" class="ml-auto btn btn-primary-outline">
			Ver toda la biblioteca
		</a>
	</x-section-title>

	{{-- Slides --}}
    {{-- <book-slider
        :items='@json($booksInSlider)'
        :number-of-cols="2"
        :number-of-rows="2"
    ></book-slider> --}}
    {{-- Cards --}}
    <div class="flex flex-wrap">
        @foreach (range(1, 4) as $i)
        <div class="w-1/2 p-2">
            <div class="bg-gray-300 rounded-lg overflow-hidden">
            <!-- Body -->
            <div class="flex h-56">
              <!-- Image -->
              <div class="flex-shrink-0 flex w-40 p-3 bg-gray-400">
                <a href="{{ route('library.show', ['slug' => 'titulo', 'book' => 1]) }}" class="block w-full h-full">
                  <img src="{{ asset('images/book-default-image.png') }}" class="block h-full w-full" style="box-shadow: 3px 3px 3px rgba(0, 0, 0, .4);">
                </a>
              </div>

              <!-- Content -->
              <div class="p-4 w-full text-sm">
                <!-- Nombre del libro -->
                <h3 class="mb-3 leading-none capitalize text-2xl">
                  <a href="{{ route('library.show', ['slug' => 'titulo', 'book' => 1]) }}">
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
</section>
@endsection
