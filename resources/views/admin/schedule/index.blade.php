@extends('admin.layouts.master')

@section('section-title', 'Agenda')

@section('content')
<section class="p-6">
    <div class="flex mb-6">
        <div class="w-1/2">
            <p class="mb-4 text-xl">Imagen principal</p>
            <img src="https://via.placeholder.com/500x250">
        </div>
        <div class="flex flex-col items-end justify-center w-1/2 text-right">
            <a href="{{ route('admin.schedule.create') }}" class="px-4 py-3 mb-6 bg-primary rounded font-semibold text-white text-xl">Agregar +</a>
            <a href="#" class="px-4 py-3 mb-6 bg-primary rounded font-semibold text-white text-xl">Filtros</a>
            <a href="#" class="px-4 py-3 border-2 border-primary rounded text-primary text-xl">
                Filtrar por
                <i class="fas fa-caret-down"></i>
            </a>
        </div>
    </div>

    <div class="h-4 bg-primary"></div>

    <div class="flex items-center my-4">
        <p class="font-semibold text-primary text-lg">Orden en el slider</p>
        <a href="{{ route('admin.schedule.slider') }}" class="ml-auto text-primary hover:underline">Editar</a>
    </div>

    {{-- Cards Slider--}}
    <div class="grid grid-cols-4 gap-6 mb-6">
        @foreach (range(1, 4) as $i)
            <div>
                <img src="https://via.placeholder.com/250x170" class="inline-block h-40 w-full">
                <div class="flex flex-col h-40 bg-gray-800 text-white text-sm">
                    <div class="flex flex-col h-full px-4 py-3">
                        <h3 class="text-2xl">Volver a casa</h3>

                        <span class="mt-auto text-red-600 font-semibold">Exposición</span>
                        <p>Entrada libre</p>
                        <p>Fotografias de Enrique X</p>
                    </div>
                    <div class="px-3 py-2 bg-red-600 text-right font-semibold">
                        04/08 al 30/08 de 10h a 23h
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="flex">
        <div class="w-1/3 mr-6">
            {{-- Calendario --}}
            <div class="px-3 py-2 mb-2 bg-primary text-white text-2xl">
                Agosto
            </div>
            <div class="h-64 py-2 mb-6">
                <div class="flex items-center justify-center h-full bg-gray-300">
                    Acá va el calendario
                </div>
            </div>

            {{-- Entrada libre --}}
            <div class="px-3 py-2 mb-2 bg-primary text-white text-2xl">
                Entrada libre de 10h a 23h
            </div>
            <div class="h-64 py-2">
                <p class="font-semibold mb-3">
                    <span class="text-primary">MUESTRA FOTOGRAFICA</span> // Enrique X // Volver a casa
                </p>
                <p class="font-semibold mb-3">
                    <span class="text-primary">ARTE CONTEMPORANEO</span> // Maria X // Todo es arte
                </p>
                <p class="font-semibold mb-3">
                    <span class="text-primary">PINTURA</span> // Enrique X // Volver a casa
                </p>
                <p class="font-semibold ">
                    <span class="text-primary">INTALACIÓN DIGITAL</span> // Enrique X // Volver a casa
                </p>
            </div>
        </div>
        {{-- Eventos por día --}}
        <div class="w-2/3">
            <div class="px-3 py-2 mb-2 bg-primary text-white text-2xl">
                MARTES 1 DE AGOSTO
            </div>
            <div class="flex items-center h-16 border-b border-gray-500">
                <span class="w-20 font-semibold text-primary">12:00h</span>
                <div>
                    <p class="font-semibold">TALLER DE PINTURA</p>
                    <p class="text-gray-700">Aula 2</p>
                </div>
            </div>
            <div class="flex items-center h-16 border-b border-gray-500">
                <span class="w-20 font-semibold text-primary">14:30h</span>
                <div>
                    <p class="font-semibold">CURSO DE ARTE DIGITAL</p>
                    <p class="text-gray-700">Aula 2</p>
                </div>
                <a href="#" class="px-2 py-1 ml-auto rounded-lg border-2 border-primary font-semibold text-sm text-primary">
                    Saca tu entrada
                </a>
            </div>
            <div class="flex items-center h-16 border-b border-gray-500">
                <span class="w-20 font-semibold text-primary">19:15h</span>
                <div>
                    <p class="font-semibold">LOS ARCANOS DEL DESIERTO</p>
                    <p class="text-gray-700">Auditorio principal</p>
                </div>
            </div>
            <div class="flex items-center h-16 border-b border-gray-500 opacity-50">
                <span class="w-20 font-semibold text-primary">20:30h</span>
                <div>
                    <p class="font-semibold">CLUB DE LECTURA</p>
                </div>
                <a href="#" class="px-2 py-1 ml-auto bg-gray-700 rounded-lg font-semibold text-sm text-white">
                    Cupos agotados
                </a>
            </div>
            <div class="flex items-center h-16 border-b border-gray-500">
                <span class="w-20 font-semibold text-primary">21:00h</span>
                <div>
                    <p class="font-semibold">LA ÚLTIMA LOCURA DE  CLAIRE</p>
                    <p class="text-gray-700">Sáca tu entrada en cine cosmos</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
