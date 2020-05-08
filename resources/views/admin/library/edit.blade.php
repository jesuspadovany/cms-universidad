@extends('admin.layouts.master')

@section('section-title', 'Biblioteca - Editar libro')

@section('content')
<section class="p-4">
    {{-- Errores de validación --}}
    <x-validation-error-list class="mb-4"></x-validation-error-list>

    <edit-book-form
        class="p-6"
        :book='@json($book)'
        :categories='@json($categories)'
        :csrf-token='@json(csrf_token())'
    ></edit-book-form>
</section>
@endsection
