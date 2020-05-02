@extends('admin.layouts.master')

@section('section-title', $page->name . ' - Editar página')

@section('content')
<div class="p-6">
    {{-- Errores de validación --}}
    <x-validation-error-list class="mb-4"></x-validation-error-list>

    <form action="{{ route('admin.pages.update', ['page' => $page->slug]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block mb-2">Nombre de la página</label>
            <input
                type="text"
                class="block w-full px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
                placeholder="Nombre de la página"
                id="name"
                name="name"
                value="{{ old('name', $page->name) }}"
            />
        </div>

        <div class="mb-4">
            <label for="contenido" class="block mb-2">Contenido</label>
            <page-editor name="content" :page='@json($page)'></page-editor>
        </div>

        <div class="text-right">
            <button type="submit" class="inline-block px-4 py-2 rounded-md bg-primary font-semibold text-white">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection
