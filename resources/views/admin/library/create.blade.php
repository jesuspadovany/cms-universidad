@extends('admin.layouts.master')

@section('section-title', 'Biblioteca')

@section('content')
<section class="p-4">
    <div class="p-6 bg-red-400 rounded {{ $errors->any() ? '' : 'hidden' }}">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>

    <create-book-form
        class="p-6"
        :categories='@json($categories)'
        :csrf-token='@json(csrf_token())'
    ></create-book-form>
</section>
@endsection
