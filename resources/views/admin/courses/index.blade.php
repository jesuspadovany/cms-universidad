@extends('admin.layouts.master')

@section('content')
<section class="p-4">
    @if ($alert = session('alert'))
        <alert
            class="mb-2"
            :type='@json($alert['type'])'
            :message='@json($alert['message'])'
        ></alert>
    @endif

     {{-- Seccion con imagen principal --}}
    <div class="flex mb-6">
        <div class="w-1/2">
            <div class="flex items-center justify-between mb-4">
                <p class="text-xl">Imagen principal</p>
                <a href="{{ route('admin.courses.changePageImage') }}" class="px-2 py-1 rounded-md bg-primary font-semibold text-white">Cambiar imagen</a>
            </div>
            @if (! is_null($page))
                <img src="{{ asset($page->image) }}">
            @endif
        </div>
        <div class="flex flex-col items-end justify-center w-1/2 text-right">
            <a href="{{ route('admin.courses.create') }}" class="px-4 py-3 mb-6 bg-primary rounded font-semibold text-white text-xl">Agregar curso</a>

            <a href="#" class="px-4 py-3 mb-6 bg-primary rounded font-semibold text-white text-xl">Filtros</a>
            <a href="#" class="px-4 py-3 border-2 border-primary rounded text-primary text-xl">
                Filtrar por
                <i class="fas fa-caret-down"></i>
            </a>
        </div>
    </div>

    {{-- Separador --}}
    <div class="h-4 bg-primary"></div>

    {{-- Orden en el slider --}}
    <div class="flex items-center my-4">
        <p class="font-semibold text-primary text-lg">Orden en el slider</p>
        <a href="#!" class="ml-auto text-primary hover:underline">Editar</a>
    </div>

    {{-- Separador --}}
    <div class="h-4 bg-primary my-4"></div>


    <h3 class="mb-4 font-semibold text-primary text-xl">Cursos</h3>
    <div class="grid grid-cols-2 grid-rows-2 gap-6">
        @foreach ($cursos as $curso)
			<div class="bg-gray-300 rounded-lg overflow-hidden">
				<div class="flex h-40">
					<div class="flex-shrink-0 flex w-32 bg-gray-400">
						<img src="{{ asset($curso->imagen) }}" heigth="100%" class="inline shadow-md">
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
                    <a href="{{ route('admin.courses.update',[$curso->id]) }}" class="m-auto hover:underline">Editar</a>

                    <form action="{{ route('admin.courses.eliminar', $curso) }}" method="POST" class="hidden" ref="formEliminar{{ $loop->index }}">
                        @csrf
                        @method('DELETE')
                    </form>
                    {{-- Modal trigger --}}
                    <confirm-modal-trigger
                        class="inline-block"
                        v-slot="{ show }"
                        @accept="$refs['formEliminar{{ $loop->index }}'].submit()"
                    >
                        <a
                            href="{{ route('admin.courses.eliminar', $curso) }}"
                            class="hover:underline"
                            @click.prevent="show"
                        >
                            Eliminar
                        </a>
                    </confirm-modal-trigger>
				</div>
			</div>
		@endforeach
	</div>
</section>
@endsection
