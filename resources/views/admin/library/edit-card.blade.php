@extends('admin.layouts.master')

@section('section-title', 'Biblioteca - Editar carta de libro')

@section('content')
<section class="p-4">
    {{-- Errores de validación --}}
    <x-validation-error-list></x-validation-error-list>

    <edit-book-card-form
        :csrf-token='@json(csrf_token())'
        :book='@json($book)'
    ></edit-book-card-form>
</section>
@endsection
