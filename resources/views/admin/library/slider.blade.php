@extends('admin.layouts.master')

@section('section-title', 'Slider de biblioteca')

@section('content')
<section class="p-4">
    @if ($alert = session('alert'))
        <alert
            class="mb-2"
            :type='@json($alert['type'])'
            :message='@json($alert['message'])'
        ></alert>
    @endif

    <books-slider-order-page
        :books-not-in-slider='@json($booksNotInSlider)'
        :books-in-slider='@json($booksInSlider)'
        :csrf-token='@json(csrf_token())'
    ></books-slider-order-page>
</section>
@endsection
