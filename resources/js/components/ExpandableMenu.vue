<template>
  <div class="bg-primary">
    <div class="container mx-auto flex px-10 py-10">
      <!-- Primera columna -->
      <div class="flex-grow-0 w-1/3 px-2">
        <ul class="list-reset text-lg text-gray-200">
          <li class="mb-1">
            <a href="#" class="font-semibold text-white">Agenda</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Artes escénicas</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Artes visuales y nueva Tec.</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Ciencia y cultura sostenible</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Cine cosmo UBA</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Cultura urbana</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">EscenaLab</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Letras y pensamientos</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Orquesta de la UBA</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Rector Ricardo Rojas</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Institucional</a>
          </li>
        </ul>
      </div>
      <!-- Segunda columna -->
      <div class="flex-grow-0 w-1/3 px-2">
        <ul class="list-reset text-lg text-gray-200">
          <li class="mb-1">
            <a href="#" class="font-semibold text-white">Contenido</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Publicaciones</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Programcación digital</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Rojas fuera de rojas</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Noches rojas en radio UBA</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Entrevistas</a>
          </li>
          <li>
            <a href="#" class="hover:text-white">Nautilus sonora</a>
          </li>
        </ul>

        <div class="my-3 border border-white"></div>

        <ul class="list-reset text-lg text-gray-200">
          <li class="mb-1">
            <a :href="url('equipo')" class="font-semibold text-white">Equipo</a>
          </li>
        </ul>

        <div class="my-3 border border-white"></div>

        <ul class="list-reset text-lg text-gray-200">
          <li class="mb-1">
            <a :href="url('prensa')" class="font-semibold text-white">Prensa</a>
          </li>
        </ul>
      </div>
      <!-- Tercera columna -->
      <div class="flex-grow-0 w-1/3 px-2">
        <ul class="list-reset text-lg text-gray-200">
          <li class="mb-1">
            <a :href="url('institucional')" class="font-semibold text-white">Institucional</a>
          </li>
        </ul>

        <div class="my-3 border border-white"></div>

        <ul class="list-reset text-lg text-gray-200">
          <li class="mb-1">
            <a href="#" class="font-semibold text-white">Terminos y condiciones</a>
          </li>
        </ul>

        <div class="my-3 border border-white"></div>

        <ul class="list-reset text-lg text-gray-200">
          <li class="mb-1">
            <a :href="url('contacto')" class="font-semibold text-white">Contacto</a>
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
