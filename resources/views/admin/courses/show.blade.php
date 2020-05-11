@extends('admin.layouts.master')

@section('section-title', 'Cursos - Detalles')

@section('content')
<section class="p-4">
    @if ($alert = session('alert'))
        <alert
            class="mb-2"
            :type='@json($alert['type'])'
            :message='@json($alert['message'])'
        ></alert>
    @endif

    <div class="flex justify-between items-center">
        <h3 class="mb-2 capitalize text-center">Detalles del curso</h3>

        {{-- Botones de Acción --}}
        <div>
            <a href="{{ route('admin.courses.edit', $course) }}" class="mr-2 text-blue-500" title="Editar">
                <i class="fas fa-edit"></i>
            </a>

            {{-- Form de eliminar --}}
            <form
                action="{{ route('admin.courses.delete', $course) }}"
                method="POST"
                class="hidden"
                ref="formEliminar"
            >
                @csrf
                @method('DELETE')
            </form>
            {{-- Modal trigger --}}
            <confirm-modal-trigger
                class="inline-block"
                v-slot="{ showModal, show, hide }"
                @accept="$refs['formEliminar'].submit()"
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
        </div>
    </div>
</section>
@endsection
