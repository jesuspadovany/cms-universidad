@extends('admin.layouts.master')

@section('section-title', 'Slider principal')

@section('content')
<section class="p-6">
    <h3 class="mb-4 font-semibold text-2xl text-primary">Vista principal</h3>

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

    {{-- Nota --}}
    <div class="my-2">
        <div class="h-4 bg-primary"></div>

        <h2 class="font-semibold text-4xl text-primary">Nota:</h2>

        <div class="font-semibold">
            Para editar los sliders se realiza de una manera sencilla: Toma desde la <span class="text-primary">"Lista de eventos"</span>
            un evento y ubicalo  en la pocisión que desees en el orden  de <span class="text-primary">"Slider principal"</span>
        </div>
    </div>

    <div>
        <div class="h-4 bg-primary"></div>

        <div class="flex">
            <div class="w-1/2 p-4">
                <h2 class="mb-4 font-semibold text-4xl text-primary">Orden del slider principal:</h2>

                @foreach (range(1, 4) as $i)
                    <div class="flex items-center">
                        <p class="mr-6 font-semibold text-6xl">
                            {{ $i }}
                        </p>
                        <div style="max-width: 250px" class="mb-6">
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
                    </div>
                @endforeach
            </div>

            <div class="w-4 bg-primary"></div>

            <div class="w-1/2 p-5">
                <h2 class="mb-4 font-semibold text-4xl text-primary">Lista de eventos:</h2>

                <ul class="text-3xl">
                    <li class="mb-4">1-. Volver a casa</li>
                    <li class="mb-4">2-. Renacer en abril</li>
                    <li class="mb-4">3-. Cursos de arte digital</li>
                    <li class="mb-4">4-. Los arcanos del desierto</li>
                    <li>5-. Futbol tenis: Un semidios vs mortales</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
