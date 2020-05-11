@extends('layouts.master')

@section('header')
<hero-section bg-image="{{ $page->image }}" bg-size="100% 100%"></hero-section>
@endsection

@section('content')
<section class="container mx-auto px-4 py-6">
    {{-- Título --}}
    <x-section-title class="mb-6 text-primary">
        <x-slot name="titleslot">
            <h2 class="flex items-center text-5xl">
                <img src="{{ asset('images/cursos-icon-red.png') }}" alt="Cursos" class="inline-block w-12 h-12 mr-4">
                Cursos
            </h2>
        </x-slot>

        <filters>
            @foreach ($categories as $category)
                <li>
                    <a
                        href="#"
                        class="filters__link"
                    >
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </filters>
    </x-section-title>

    <div class="grid grid-cols-2 gap-6">
        @foreach ($courses as $course)
            <course-card
                :course='@json($course)'
            ></course-card>
		@endforeach
	</div>
</section>
@endsection
