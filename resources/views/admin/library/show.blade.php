@extends('admin.layouts.master')

@section('section-title', 'Biblioteca - Detalles')

@section('content')
<section class="p-4">
    @if ($alert = session('alert'))
        <alert
            class="mb-2"
            :type='@json($alert['type'])'
            :message='@json($alert['message'])'
        ></alert>
    @endif

    <div class="flex justify-between items-center">
        <h3 class="mb-2 capitalize text-center">Detalles del libro</h3>

        {{-- Botones de Acción --}}
        <div>
            <a href="{{ route('admin.library.edit', $book) }}" class="mr-2 text-blue-500" title="Editar">
                <i class="fas fa-edit"></i>
            </a>

            {{-- Form de eliminar --}}
            <form
                action="{{ route('admin.library.delete', $book) }}"
                method="POST"
                class="hidden"
                ref="formEliminar"
            >
                @csrf
                @method('DELETE')
            </form>
            {{-- Modal trigger --}}
            <confirm-modal-trigger
                class="inline-block"
                v-slot="{ showModal, show, hide }"
                @accept="$refs['formEliminar'].submit()"
            >
                <a
                    href="{{ route('admin.library.delete', $book) }}"
                    class="text-red-700"
                    title="Eliminar"
                    @click.prevent="show"
                >
                    <i class="fas fa-trash"></i>
                </a>
            </confirm-modal-trigger>
        </div>
    </div>

    <div class="px-4 py-2 rounded-md bg-gray-200">
        {{-- Título --}}
        <div class="flex py-3 border-b border-gray-400">
            <div class="w-1/4 font-semibold">
                Título
            </div>
            <div class="w-3/4">
                {{ $book->title }}
            </div>
        </div>

        {{-- Sinopsis --}}
        <div class="flex py-3 border-b border-gray-400">
            <div class="w-1/4 font-semibold">
                Sinopsis
            </div>
            <div class="w-3/4">
                {{ $book->synopsis }}
            </div>
        </div>

        {{-- Autor --}}
        <div class="flex py-3 border-b border-gray-400">
            <div class="w-1/4 font-semibold">
                Autor
            </div>
            <div class="w-3/4">
                {{ $book->author }}
            </div>
        </div>

        {{-- Cantida de páginas --}}
        <div class="flex py-3 border-b border-gray-400">
            <div class="w-1/4 font-semibold">
                Cantidad de páginas
            </div>
            <div class="w-3/4">
                {{ $book->num_of_pages }}
            </div>
        </div>

        {{-- Fecha de publicación --}}
        <div class="flex py-3 border-b border-gray-400">
            <div class="w-1/4 font-semibold">
                Fecha de publicación
            </div>
            <div class="w-3/4">
                {{ $book->published_at->format('d/m/Y') }}
            </div>
        </div>

        {{-- Categorias --}}
        <div class="flex py-3 border-b border-gray-400">
            <div class="w-1/4 font-semibold">
                Categorias
            </div>
            <div class="w-3/4">
                @foreach ($book->categories as $category)
                    {{ $category->name . ($loop->last ? '' : ',') }}
                @endforeach
            </div>
        </div>

        {{-- ¿Es gratuito? --}}
        <div class="flex py-3 border-b border-gray-400">
            <div class="w-1/4 font-semibold">
                ¿Es gratuito?
            </div>
            <div class="w-3/4">
                {{ $book->is_free ? 'Si' : 'No' }}
            </div>
        </div>

        {{-- Precio --}}
        <div class="flex py-3 border-b border-gray-400">
            <div class="w-1/4 font-semibold">
                Precio
            </div>
            <div class="w-3/4">
                {{ $book->price }}
            </div>
        </div>

        {{-- ¿Es electrónico? --}}
        <div class="flex py-3 border-b border-gray-400">
            <div class="w-1/4 font-semibold">
                ¿Es electrónico?
            </div>
            <div class="w-3/4">
                {{ $book->is_electronic ? 'Si' : 'No' }}
            </div>
        </div>

        @if ($book->is_electronic)
            {{-- Archivo --}}
            <div class="flex py-3">
                <div class="w-1/4 font-semibold">
                    Archivo
                </div>
                <div class="w-3/4">
                    <a href="#">Ver archivo</a>
                </div>
            </div>
        @else
            {{-- Ubicación --}}
            <div class="flex py-3">
                <div class="w-1/4 font-semibold">
                    Ubicación
                </div>
                <div class="w-3/4">
                    {{ $book->location }}
                </div>
            </div>
        @endif
    </div>

    {{-- Seccion de carta de información del libro --}}
    <div class="flex justify-between items-center">
        <h3 class="my-2">
            Carta de información del libro
        </h3>

        <a href="{{ route('admin.library.editCard', $book) }}" class="text-blue-500" title="Editar carta">
            <i class="fas fa-edit"></i>
        </a>
    </div>

    {{-- Carta --}}
    <div class="flex justify-center">
        <div class="w-1/2">
            <book-card
                :card='@json($card)'
            ></book-card>
        </div>
    </div>
</section>
@endsection
