@extends('layouts.master')

@section('header')
	<main-slider :slides='@json($slides)'></main-slider>
@endsection

@section('content')
{{-- Sección de agenda --}}
<section class="container mx-auto px-4 py-6">
	{{-- Título --}}
	<x-section-title title="Agenda" icon="fas fa-calendar-alt" class="mb-6 text-primary">
		<a href="#" class="px-3 py-2 rounded-lg border-2 border-primary font-semibold">
			Ver agenda por día
		</a>
	</x-section-title>

	{{-- Cards Slider--}}
	<div class="grid grid-cols-4 grid-rows-2 gap-6">
		@foreach (range(1, 8) as $i)
			<div>
				<img src="https://via.placeholder.com/250x170" class="inline-block h-48 w-full">
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
		@endforeach
	</div>
</section>

{{-- Sección de cursos --}}
<section class="bg-red-900 text-white">
	<div class="container mx-auto px-4 py-6">
		{{-- Título --}}
		<x-section-title title="Cursos y actividades" icon="fas fa-cubes" class="mb-6">
			<a href="#" class="ml-auto px-3 py-2 rounded-lg border-2 border-white font-semibold">
				Filtrar por temática
			</a>
		</x-section-title>

		{{-- Cards Slider--}}
		<div class="grid grid-cols-4 grid-rows-1 gap-6">
			@foreach (range(1, 4) as $i)
				<div>
					<img src="https://via.placeholder.com/250x170" class="inline-block h-64 w-full">
					<div class="flex flex-col h-40 bg-white text-gray-800 text-sm">
						<div class="flex flex-col h-full px-4 py-3">
							<h3 class="text-2xl">Percusión</h3>

							<p class="mt-auto">
								A cargo del grupo Maruma todos los viernes a las 19
								nivel inicial e intermedio. <b>Incribte gratis</b>
							</p>
						</div>
						<div class="px-3 py-2 bg-red-600 font-semibold text-right text-xl text-white">
							<a href="#">Ver +</a>
						</div>
					</div>
				</div>
			@endforeach
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
	<x-section-title title="Biblioteca" icon="fas fa-book" class="mb-6 text-primary">
		<a href="#" class="ml-auto px-3 py-2 rounded-lg border-2 border-primary font-semibold">
			Ver toda la biblioteca
		</a>
	</x-section-title>

	<div class="grid grid-cols-2 grid-rows-2 gap-6">
		@foreach (range(1, 4) as $i)
			<div class="bg-gray-300 rounded-lg overflow-hidden">
				<div class="flex h-40">
					<div class="flex-shrink-0 flex w-32 bg-gray-400">
						<img src="https://via.placeholder.com/65x100" class="inline h-32 m-auto shadow-md">
					</div>
					<div class="p-4 w-full">
						<h3 class="text-xl mb-2">Somos nuestro cerebro</h3>

						<p>
							Capo sinceramente supiera lo que dice aquí lo escribiria pero no tengo ni la mejor idea,
							si sabes lo que dice por favor escribemelo
						</p>
					</div>
				</div>
				<div class="flex px-3 py-2 bg-primary font-semibold text-white">
					<span>Gratis</span>
					<a href="#" class="ml-auto">Leer</a>
				</div>
			</div>
		@endforeach
	</div>
</section>
@endsection
