@extends('admin.layouts.master')

@section('section-title', 'Biblioteca')

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
                <a href="{{ route('admin.library.changePageImage') }}" class="px-2 py-1 rounded-md bg-primary font-semibold text-white">Cambiar imagen</a>
            </div>
            <img src="{{ asset($page->image) }}">
        </div>
        <div class="flex flex-col items-end justify-center w-1/2 text-right">
            <a href="{{ route('admin.library.create') }}" class="px-4 py-3 mb-6 bg-primary rounded font-semibold text-white text-xl">Agregar libro</a>
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
        <a href="{{ route('admin.library.slider') }}" class="ml-auto text-primary hover:underline">Editar</a>
    </div>

    {{-- Slides --}}
    <book-slider
        :items='@json($booksInSlider)'
        :number-of-cols="2"
        :number-of-rows="2"
    ></book-slider>

    {{-- Separador --}}
    <div class="h-4 bg-primary my-4"></div>

    <h3 class="mb-4 font-semibold text-primary text-xl">Libros</h3>

    {{-- Tabla de libros --}}
    <table class="w-full rounded-md overflow-hidden bg-gray-200 text-left">
        <thead>
            <tr>
                <th class="px-3 py-2 bg-gray-400">Título</th>
                <th class="px-3 py-2 bg-gray-400">¿Es gratuito?</th>
                <th class="px-3 py-2 bg-gray-400">Precio</th>
                <th class="px-3 py-2 bg-gray-400"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td class="px-3 py-2 {{ !$loop->last ? 'border-b' : '' }} border-gray-400">{{ $book->title }}</td>
                    <td class="px-3 py-2 {{ !$loop->last ? 'border-b' : '' }} border-gray-400">{{ $book->is_free ? 'Si' : 'No' }}</td>
                    <td class="px-3 py-2 {{ !$loop->last ? 'border-b' : '' }} border-gray-400">{{ $book->price }}</td>
                    <td class="px-3 py-2 {{ !$loop->last ? 'border-b' : '' }} border-gray-400">
                        {{-- Form de eliminar --}}
                        <form
                            action="{{ route('admin.library.delete', $book) }}"
                            method="POST"
                            class="hidden"
                            ref="form-{{ $loop->index }}"
                        >
                            @csrf
                            @method('DELETE')
                        </form>
                        {{-- Modal trigger --}}
                        <confirm-modal-trigger
                            class="inline-block"
                            v-slot="{ showModal, show, hide }"
                            @accept="$refs['form-{{ $loop->index }}'].submit()"
                        >
                            <a
                                href="#!"
                                class="hover:underline"
                                @click.prevent="show"
                            >
                                Eliminar
                            </a>
                        </confirm-modal-trigger>
                        <a href="#!" class="ml-3">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
