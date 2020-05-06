@extends('layouts.master')

@section('header')
    <hero-section bg-image="{{ asset($cursos[0]->imagen) }}"></hero-section>
@endsection

@section('content') 
<section class="container mx-auto px-4 py-6">
    <h4 class="text-primary text-5xl"><i class="fab fa-leanpub"></i> {{ $cursos[0]->nombre }}</h4>
    <hr class="bg-primary">
    <div>
        <h4 class="text-primary text-4xl">Descripción del curso</h4>
        <h6>{{ $cursos[0]->descripcion_curso }}</h6>
        <h4 class="text-primary text-4xl">Descripcion general</h4>
        <h6>{{ $cursos[0]->descipcion }}</h6>
        <h4 class="text-primary text-4xl">Ubicacion</h4>
        <h6>{{ $cursos[0]->ubicacion }}</h6>
        <h4 class="text-primary text-4xl">Anfitrion</h4>
        <h6>{{ $cursos[0]->anfitrion }}</h6>
        <h4 class="text-primary text-4xl">Profesor</h4>
        <h6>{{ $cursos[0]->profesor }}</h6>
        <h4 class="text-primary text-4xl">Tipo de clase</h4>
        <h6>{{ $cursos[0]->clase }}</h6>
        <h4 class="text-primary text-4xl">Precio</h4>
        <h6>{{ $cursos[0]->precio }}</h6>
    </div>       
</section>
@endsection