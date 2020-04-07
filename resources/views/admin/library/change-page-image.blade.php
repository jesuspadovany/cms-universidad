@extends('admin.layouts.master')

@section('section-title', 'Bibioteca - Cambiar imagen')

@section('content')
<section class="p-4">
    <div class="p-6 mb-3 bg-red-400 rounded {{ $errors->any() ? '' : 'hidden' }}">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>

    <h1 class="text-2xl">Seleccionar imagen</h1>
    <form action="{{ route('admin.library.changePageImage') }}" method="POST" enctype="multipart/form-data">
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
