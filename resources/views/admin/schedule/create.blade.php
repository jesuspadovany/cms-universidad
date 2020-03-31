@extends('admin.layouts.master')

@section('section-title', 'Agenda')

@section('content')
<section class="p-4">
    <div class="p-6">

        <div class="flex items-center mb-5">
            <label for="titulo_imagen" class="w-1/4">Título de imagen</label>
            <input
                type="text"
                name="titulo_imagen"
                id="titulo_imagen"
                placeholder="Título de imagen"
                class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
            >
        </div>

        <div class="flex items-center mb-5">
            <label for="descricion_imagen" class="w-1/4">Descripción de imagen</label>
            <input
                type="text"
                name="descricion_imagen"
                placeholder="Descripción de imagen"
                class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
            >
        </div>

        <div class="flex items-center mb-5">
            <label for="descripcion" class="w-1/4">Descripción</label>
            <input
                type="text"
                name="descripcion"
                id="descripcion"
                placeholder="Descripción"
                class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
            >
        </div>

        <div class="flex items-center mb-5">
            <label for="horario" class="w-1/4">Horario y fecha</label>
            <input
                type="text"
                name="horario"
                id="horario"
                placeholder="--/--/-- a --/--/-- Hora de inicio hh:mm"
                class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
            >
        </div>

        <div class="flex items-center mb-5">
            <label for="numero_entradas" class="w-1/4">Número de entradas</label>
            <input
                type="number"
                name="numero_entradas"
                id="numero_entradas"
                placeholder="Número de entradas"
                class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
            >
        </div>

        <div class="flex items-center mb-5">
            <label for="tipo_entrada" class="w-1/4">Tipo de entrada</label>
            <select
                name="tipo_entrada"
                id="tipo_entrada"
                class="w-2/4 px-2 py-2 bg-transparent focus:outline-none focus:shadow-outline border border-gray-400"
            >
                <option value="" disabled selected>Seleccione una opción</option>
                <option value="gratuita">gratuita</option>
                <option value="pago">pago</option>
            </select>
        </div>

        <div class="flex items-center mb-5">
            <label for="costo_entrada" class="w-1/4">Costo de la entrada</label>
            <input
                type="number"
                name="costo_entrada"
                id="costo_entrada"
                placeholder="Costo de la entrada"
                class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
            >
        </div>

        <div class="flex items-center mb-5">
            <label for="categoria" class="w-1/4">Categoría</label>
            <input
                type="text"
                name="categoria"
                id="categoria"
                placeholder="Categoría"
                class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
            >
        </div>

        <div class="flex items-center mb-5">
            <label for="ubicacion" class="w-1/4">Ubicación</label>
            <input
                type="text"
                name="ubicacion"
                id="ubicacion"
                placeholder="Ubicación"
                class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
            >
        </div>

        <div class="text-center">
            <a href="#" class="inline-block px-5 py-2 rounded-md bg-primary font-semibold text-white mr-6">
                Agregar imagen
            </a>
            <a href="#" class="inline-block px-5 py-2 rounded-md bg-primary font-semibold text-white mb-6">
                Eliminar imagen
            </a>
            <div>
                <img src="https://via.placeholder.com/500x220" class="inline-block">
            </div>
        </div>

        <div class="text-right mt-6">
            <a href="#" class="inline-block px-6 py-3 rounded-md bg-primary font-semibold text-white mr-6">
                Guardar
            </a>
        </div>
    </div>
</section>
@endsection
