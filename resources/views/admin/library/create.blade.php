@extends('admin.layouts.master')

@section('section-title', 'Biblioteca - Agregar libro')

@section('content')
<section class="p-4">
    {{-- Errores de validación --}}
    <x-validation-error-list></x-validation-error-list>

    <create-book-form
        class="p-6"
        :categories='@json($categories)'
        :csrf-token='@json(csrf_token())'
        :old-data='@json($oldData)'
    ></create-book-form>
</section>
@endsection
