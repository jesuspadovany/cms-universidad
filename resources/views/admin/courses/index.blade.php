@extends('admin.layouts.master')

@section('content')
<section class="p-4">
    @if ($alert = session('alert'))
        <alert
            class="mb-2"
            :type='@json($alert['type'])'
            :message='@json($alert['message'])'
        ></alert>
    @endif

     {{-- Seccion con imagen principal --}}
    <div class="flex mb-6">
        <div class="w-1/2">
            <div class="flex items-center justify-between mb-4">
                <p class="text-xl">Imagen principal</p>
                <a href="{{ route('admin.courses.changePageImage') }}" class="btn btn-primary px-2 py-1 text-sm">Cambiar imagen</a>
            </div>
            @if (! is_null($page))
                <img src="{{ asset($page->image) }}">
            @endif
        </div>
        <div class="flex flex-col items-end justify-center w-1/2 text-right">
            <a href="{{ route('admin.courses.create') }}" class="btn btn-primary px-4 py-3 mb-6 text-xl">Agregar curso</a>

            <a href="#" class="btn btn-primary px-4 py-3 text-xl">Filtros</a>
        </div>
    </div>

    {{-- Separador --}}
    <div class="h-4 bg-primary"></div>

    {{-- Orden en el slider --}}
    <div class="flex items-center my-4">
        <p class="font-semibold text-primary text-lg">Orden en el slider</p>

        <a href="#" class="btn btn-primary px-2 py-1 ml-auto text-sm">Editar</a>
    </div>

    {{-- Separador --}}
    <div class="h-4 bg-primary my-4"></div>


    <h3 class="mb-4 font-semibold text-primary text-xl">Cursos</h3>

    {{-- Tabla de cursos --}}
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>¿Es gratuito?</th>
                <th>Precio</th>
                <th>Profesor(a)</th>
                <th>Tipo</th>
                <th>Duración</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->nombre }}</td>
                    <td>{{ $course->is_free ? 'Si' : 'No' }}</td>
                    <td>{{ $course->precio }}</td>
                    <td>{{ $course->profesor }}</td>
                    <td>{{ $course->tipo }}</td>
                    <td>{{ $course->duracion }}</td>
                    <td width="120" class="text-right">
                        {{-- Link de ver detalles --}}
                        <a href="{{ route('admin.courses.show', $course) }}" class="mr-2 text-green-500">
                            <i class="fas fa-eye"></i>
                        </a>

                        {{-- Link de editar --}}
                        <a href="{{ route('admin.courses.edit', $course) }}" class="mr-2 text-blue-600" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>

                        {{-- Form de eliminar --}}
                        <form
                            action="{{ route('admin.courses.delete', $course) }}"
                            method="POST"
                            class="hidden"
                            ref="form-{{ $loop->index }}"
                        >
                            @csrf
                            @method('DELETE')
                        </form>
                        {{-- Modal trigger --}}
                        <confirm-modal-trigger
                            class="inline-block"
                            v-slot="{ showModal, show, hide }"
                            @accept="$refs['form-{{ $loop->index }}'].submit()"
                        >
                            <a
                                href="{{ route('admin.courses.delete', $course) }}"
                                class="text-red-700"
                                title="Eliminar"
                                @click.prevent="show"
                            >
                                <i class="fas fa-trash"></i>
                            </a>
                        </confirm-modal-trigger>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4 text-center">
        {{ $courses->links() }}
    </div>
</section>
</section>
@endsection
