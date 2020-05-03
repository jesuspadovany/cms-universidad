@extends('admin.layouts.master')

@section('section-title', $page->name . ' - Cambiar imagen')

@section('content')
<section class="p-4">
    <h2 class="text-2xl">Imagen actual</h2>

    {{-- Imagen Actual --}}
    <div style="height: 450px">
        <hero-section bg-image="{{ $page->image }}"></hero-section>
    </div>

    {{-- Errores de validación --}}
    <x-validation-error-list class="mt-4"></x-validation-error-list>

    <h1 class="text-2xl mt-2">Seleccionar imagen nueva</h1>

    {{-- Form de imagen nueva --}}
    <form action="{{ route('admin.pages.updateImage', ['page' => $page->slug]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input-image-with-preview name="image"></input-image-with-preview>

        <div class="text-right">
            <button type="submit" class="inline-block px-6 py-3 mt-3 rounded-md bg-primary font-semibold text-white">
                Guardar
            </button>
        </div>
    </form>
</section>
@endsection
