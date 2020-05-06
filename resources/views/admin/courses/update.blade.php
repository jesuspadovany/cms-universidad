@extends('admin.layouts.master')

@section('section-title', 'Cursos')

@section('content')
<section class="p-4">
    <div class="p-6 bg-red-400 rounded {{ $errors->any() ? '' : 'hidden' }}">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>
    
    <update-course
        class="p-6"
        v-bind:data_cursos='@json($curso)'
        :categories='@json($categories)'
        :csrf-token='@json(csrf_token())'
    ></update-course>
</section>
@endsection