@extends('layouts.master')

@section('content')
<section class="container mx-auto px-4 py-6">
    <x-section-title title="Biblioteca" icon="fas fa-book" class="mb-6 text-primary">
        <a href="#" class="px-3 py-2 rounded-lg border-2 border-primary font-semibold">
            filtrar por
            <i class="fas fa-caret-down"></i>
        </a>
    </x-section-title>

    {{-- Cards --}}
    <div class="grid grid-cols-2 gap-6 mb-6">
        @foreach (range(1, 10) as $i)
            <div class="bg-gray-300 rounded-lg overflow-hidden">
                <div class="flex h-40">
                    <div class="flex-shrink-0 flex w-32 bg-gray-400">
                        <img src="https://via.placeholder.com/65x100" class="inline h-32 m-auto shadow-md">
                    </div>
                    <div class="p-4 w-full">
                        <h3 class="text-xl mb-2">Somos nuestro cerebro</h3>

                        <p>
                            Capo sinceramente supiera lo que dice aquí lo escribiria pero no tengo ni la mejor idea,
                            si sabes lo que dice por favor escribemelo
                        </p>
                    </div>
                </div>
                <div class="flex px-3 py-2 bg-primary font-semibold text-white">
                    <span>Gratis</span>
                    <a href="#" class="ml-auto">Leer</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center">
        <a href="#" class="inline-block px-16 py-2 bg-primary rounded-md font-semibold text-white">
            Más...
        </a>
    </div>
</section>
@endsection
