@extends('admin.layouts.master')

@section('section-title', 'Slider principal')

@section('content')
<div class="p-4">
    @if ($alert = session('alert'))
        <alert :type='@json($alert['type'])' :message='@json($alert['message'])'></alert>
    @endif

    {{-- Slides --}}
    <div class="flex flex-wrap">
        @foreach ($slides as $slide)
            <div class="relative w-1/4 p-2">
                <img src="{{ asset($slide->image) }}" class="block w-full h-40">

                {{-- Formulario de eliminar --}}
                <form
                    action="{{ route('admin.slider.delete', $slide) }}"
                    method="POST"
                    class="hidden"
                    ref="form-{{ $loop->index }}"
                >
                    @method('DELETE')
                    @csrf
                </form>
                <confirm-modal-trigger
                    v-slot="{ showModal, show, hide }"
                    v-on:accept="$refs['form-{{ $loop->index }}'].submit()"
                >
                    <button
                        type="button"
                        class="absolute top-0 right-0 inline-flex items-center justify-center w-8 h-8 mt-3 mr-3 focus:outline-none focus:shadow-outline rounded-full bg-primary text-white"
                        @click="show"
                    >
                        <i class="fas fa-times"></i>
                    </button>
                </confirm-modal-trigger>
            </div>
        @endforeach
    </div>

    <div class="p-2 text-right">
        <a href="{{ route('admin.slider.create') }}" class="inline-block px-4 py-2 rounded-md bg-primary font-semibold text-white">
            Agregar +
        </a>
    </div>

    {{-- Nota --}}
    <div class="px-2 my-2">
        <div class="h-6 bg-primary"></div>

        <h2 class="font-semibold text-4xl text-primary">Nota:</h2>

        <div class="font-semibold">
            <p class="mb-2">
                Esta página se encarga del orden de los sliders  en la pantalla principal, tienes la opción de:
            </p>
            <ul class="pl-2">
                <li>
                    - Asignar la posición
                </li>
                <li>
                    - Agregar
                </li>
                <li>
                    - Eliminar
                </li>
                <li>
                    - Modificar posición
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
