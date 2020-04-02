@extends('admin.layouts.master')

@section('section-title', 'Slider Principal')

@section('content')
<section class="p-4">
    <div class="p-6 bg-red-400 rounded {{ $errors->any() ? '' : 'hidden' }}">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>

    <create-slide-form
        class="p-6"
        :csrf-token='@json(csrf_token())'
        :slides='@json($slides)'
    ></create-slide-form>
</section>
@endsection
