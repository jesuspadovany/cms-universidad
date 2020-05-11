@extends('admin.layouts.master')

@section('section-title', 'Cursos')

@section('content')
<section class="p-4">
    <div class="p-6 bg-red-400 rounded {{ $errors->any() ? '' : 'hidden' }}">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>

    <create-course-form
        class="p-6"
        :categories='@json($categories)'
        :csrf-token='@json(csrf_token())'
    ></create-course-form>
</section>
@endsection
