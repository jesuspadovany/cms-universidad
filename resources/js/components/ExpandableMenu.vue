<template>
  <div class="bg-primary">
    <div class="container mx-auto flex px-10 py-10">
      <!-- Primera columna -->
      <div class="flex-grow-0 w-1/3 px-6">
        <ul class="list-reset text-lg text-gray-200">
          <li class="mb-1">
            <a href="#" class="font-semibold text-white">Agenda</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Arte</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Ciencia</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Cine y video</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Comunicación</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Cultura sotenible</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Danza</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Diseño</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Fotografía</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Música</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Teatro</a>
          </li>
        </ul>
      </div>
      <!-- Segunda columna -->
      <div class="flex-grow-0 w-1/3 px-6">
        <ul class="list-reset text-lg text-gray-200">
          <li class="mb-1">
            <a href="#" class="font-semibold text-white">Cursos</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Niños</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Mayores de 18</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Adultos mayores</a>
          </li>
        </ul>

        <div class="my-3 border border-white"></div>

        <ul class="list-reset text-lg text-gray-200">
          <li class="mb-1">
            <a href="#" class="font-semibold text-white">Biblioteca</a>
          </li>
        </ul>
      </div>
      <!-- Tercera columna -->
      <div class="flex-grow-0 w-1/3 px-6">
        <ul class="list-reset text-lg text-gray-200">
          <li class="mb-1">
            <a :href="url('institucional')" class="font-semibold text-white">Institucional</a>
          </li>
        </ul>

        <div class="my-3 border border-white"></div>

        <ul class="list-reset text-lg text-gray-200">
          <li class="mb-1">
            <a href="#" class="font-semibold text-white">Contacto</a>
          </li>
        </ul>

        <div class="my-3 border border-white"></div>

        <ul class="list-reset text-lg text-gray-200">
          <li class="mb-1">
            <a :href="url('contacto')" class="font-semibold text-white">Radio</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import { useUrlGenerator } from '@/composables/useUrlGenerator';

export default {
  setup() {
    const url = useUrlGenerator();

    return {
      url
    }
  }
}
</script>
