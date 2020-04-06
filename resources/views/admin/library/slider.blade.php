@extends('admin.layouts.master')

@section('section-title', 'Slider de biblioteca')

@section('content')
<section class="p-4">
    <books-slider-order-page
        :books-not-in-slider='@json($booksNotInSlider)'
        :books-in-slider='@json($booksInSlider)'
        :csrf-token='@json(csrf_token())'
    ></books-slider-order-page>
</section>
@endsection
