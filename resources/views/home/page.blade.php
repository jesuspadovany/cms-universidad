@extends('layouts.master')

@section('header')
<hero-section bg-image="{{ $page->image }}"></hero-section>
@endsection

@section('content')
<section class="container mx-auto px-4 py-6">
    {!! $page->content !!}
</section>
@endsection
