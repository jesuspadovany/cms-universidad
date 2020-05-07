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
                    <img src="{{ asset('images/cursos-icon-red.png') }}" alt="Cursos" class="inline-block w-12 h-12 mr-4">
                    Cursos
                </h2>
            </x-slot>

			<filters>
                @foreach ($categories as $category)
                    <li>
                        <a
                            href="#"
                            class="filters__link"
                        >
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </filters>
		</x-section-title>

	<div class="grid grid-cols-2  gap-6">
		@foreach (range(1, 10) as $i)
			<div class="bg-gray-300 rounded-lg overflow-hidden" style="box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.38);}">
				<div class="flex h-56">
					<div class="flex-shrink-0 flex w-32 bg-gray-400">
                        <a href="{{ route('courses.detalle', ['id' => 1]) }}" class="block w-full h-full">
                            <img src="{{ asset('images/curso-default-image.png') }}" class="inline w-full h-full">
                        </a>
					</div>
					<div class="p-4 w-full text-sm">
						<h3 class="text-xl mb-2">
                            <a href="{{ route('courses.detalle', ['id' => 1]) }}">
                                Tatto Art
                            </a>
                        </h3>
						<p>
							MARTES Y JUEVES DE 8 A 10
						</p>

                        <p class="mb-2">
                            8 clases / Profesora: Rosario Dawson
                        </p>

                        <p>
                            Los nuevos paradigmas cientificos son un mapa desde donde volver a descubrir el mundo, ya que bajo los ojos de la ciencia nuestro universo
                        </p>

                        <div class="mt-2 font-semibold text-primary">
                            <a href="#">DISEÑO</a> /
                            <a href="#">ILUSTRACIÓN</a>
                        </div>
					</div>
				</div>
				<div class="flex px-3 py-2 bg-primary font-semibold text-white">
					<span>
						$2800 (No incluye material)
					</span>
					<a href="#" class="ml-auto hover:underline">Inscribete</a>
				</div>
			</div>
		@endforeach
	</div>
</section>
@endsection
