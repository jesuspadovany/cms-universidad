@extends('layouts.master')

@section('header')
<hero-section bg-image="{{ $page->image }}"></hero-section>
@endsection

@section('content')
<section class="container mx-auto px-4 py-6">
	{{-- Cursos Precenciales --}}
	<x-section-title title="Cursos precenciales" icon="fas fa-cubes" class="mb-6 text-primary">
		<a href="#" class="px-3 py-2 rounded-lg border-2 border-primary font-semibold">
			filtrar por
			<i class="fas fa-caret-down"></i>
		</a>
	</x-section-title>

	<div class="grid grid-cols-2  gap-6"> 
		@foreach ($cursos as $curso)
			@if ($curso->clase == 1)
			<div class="bg-gray-300 rounded-lg overflow-hidden">
				<div class="flex h-40">
					<div class="flex-shrink-0 flex w-32 bg-gray-400">
						<img src="{{ asset($curso->imagen) }}" class="inline shadow-md">
					</div>
					<div class="p-4 w-full">
						<h3 class="text-xl mb-2">{{$curso->nombre}}</h3>
						<p>
							{{$curso->descripcion_curso}}
						</p>
						<br>
						<p class="text-primary">
							@foreach($curso->categories as  $category)
								{{ $category->name }},
							@endforeach
						</p>
					</div>
				</div>
				<div class="flex px-3 py-2 bg-primary font-semibold text-white">
					<span>
						@if($curso->precio == 0)
							Gratis
						@else
							{{$curso->precio}} ARS 
						@endif  
					</span>
					<span>
						@if($curso->material == null)
							&nbsp;(No incluye material)
						@else
							&nbsp;(Incluye material)
						@endif  
					</span>
					<a href="{{ route('courses.detalle',[$curso->id]) }}" class="ml-auto hover:underline">Inscribete</a>
				</div>
			</div>
			@endif
		@endforeach
	</div>

	{{-- Cursos online --}}
	<x-section-title title="Cursos online" icon="fas fa-cubes" class="my-6 text-primary">
		<a href="#" class="px-3 py-2 rounded-lg border-2 border-primary font-semibold">
			filtrar por
			<i class="fas fa-caret-down"></i>
		</a>
	</x-section-title>

	<div class="grid grid-cols-2 gap-6"> 
		@foreach ($cursos ?? '' as $curso)
			@if ($curso->clase == 2)
			<div class="bg-gray-300 rounded-lg overflow-hidden">
				<div class="flex h-40">
					<div class="flex-shrink-0 flex w-32 bg-gray-400">
						<img src="{{ asset($curso->imagen) }}"  class="inline shadow-md">
					</div>
					<div class="p-4 w-full">
						<h3 class="text-xl mb-2">{{$curso->nombre}}</h3>
						<p>
							{{$curso->descripcion_curso}}
						</p>
						<br>
						<p class="text-primary">
							@foreach($curso->categories as  $category)
								{{ $category->name }},
							@endforeach
						</p>
					</div>
				</div>
				<div class="flex px-3 py-2 bg-primary font-semibold text-white">
					<span>
						@if($curso->precio == 0)
							Gratis
						@else
							{{$curso->precio}} ARS  
						@endif  
					</span>
					<span>
						@if($curso->material == null)
							&nbsp;(No incluye material)
						@else
							&nbsp;(Incluye material)
						@endif  
					</span>
					<a href="{{ route('courses.detalle',[$curso->id]) }}" class="ml-auto hover:underline">Inscribete</a>
				</div>
			</div>
			@endif
		@endforeach
	</div>
</section>
@endsection
