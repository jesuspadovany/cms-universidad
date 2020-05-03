@extends('admin.layouts.master')

@section('section-title', $page->name)

@section('content')

@if ($alert = session('alert'))
    <alert
        class="p-4"
        :type='@json($alert['type'])'
        :message='@json($alert['message'])'
    ></alert>
@endif

<section class="p-4">
    <div class="flex justify-between items-center">
        <a
            href="{{ route('admin.pages.edit', ['page' => $page->slug]) }}"
            class="btn btn-primary"
        >
            Editar página
        </a>
        <a
            href="{{ route('admin.pages.editImage', ['page' => $page->slug]) }}"
            class="btn btn-primary"
        >
            Cambiar imagen
        </a>
    </div>
</section>

<section>
    {{-- Hero section --}}
    <div style="height: 450px">
        <hero-section bg-image="{{ $page->image }}"></hero-section>
    </div>

    {{-- Contenido HTML --}}
    <div class="px-4 py-6">
        {!! $page->content !!}
    </div>
</section>
@endsection
