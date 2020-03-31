@extends('layouts.master')

@section('content')
<section class="container mx-auto px-4 py-6">
	{{-- Cursos Precenciales --}}
	<x-section-title title="Cursos precenciales" icon="fas fa-cubes" class="mb-6 text-primary">
		<a href="#" class="px-3 py-2 rounded-lg border-2 border-primary font-semibold">
			filtrar por
			<i class="fas fa-caret-down"></i>
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
						<h3 class="text-xl mb-2">Tatoo art</h3>

						<p>
							Capo sinceramente supiera lo que dice aquí lo escribiria pero no tengo ni la mejor idea,
							si sabes lo que dice por favor escribemelo
						</p>
					</div>
				</div>
				<div class="flex px-3 py-2 bg-primary font-semibold text-white">
					<span>
						$2800
						<span class="text-sm">
							(Incluye materiales)
						</span>
					</span>
					<a href="#" class="ml-auto hover:underline">Incribete</a>
				</div>
			</div>
		@endforeach
	</div>

	{{-- Cursos online --}}
	<x-section-title title="Cursos online" icon="fas fa-cubes" class="my-6 text-primary">
		<a href="#" class="px-3 py-2 rounded-lg border-2 border-primary font-semibold">
			filtrar por
			<i class="fas fa-caret-down"></i>
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
						<h3 class="text-xl mb-2">Tatoo art</h3>

						<p>
							Capo sinceramente supiera lo que dice aquí lo escribiria pero no tengo ni la mejor idea,
							si sabes lo que dice por favor escribemelo
						</p>
					</div>
				</div>
				<div class="flex px-3 py-2 bg-primary font-semibold text-white">
					<span>
						$2800
						<span class="text-sm">
							(Incluye materiales)
						</span>
					</span>
					<a href="#" class="ml-auto hover:underline">Incribete</a>
				</div>
			</div>
		@endforeach
	</div>
</section>
@endsection