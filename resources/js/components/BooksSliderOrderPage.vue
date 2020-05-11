<template>
  <div>
    <h3 class="mb-4 font-semibold text-2xl text-primary">Vista previa</h3>

    <BookSlider
      :items='localBooksInSlider'
      :number-of-cols="2"
      :number-of-rows="2"
    />

    <!-- Nota -->
    <div class="my-4">
      <div class="h-4 bg-primary"></div>

      <h2 class="font-semibold text-4xl text-primary">Nota:</h2>

      <div class="font-semibold">
        Para editar los sliders se realiza de una manera sencilla: Toma desde la <span class="text-primary">"Lista de libros"</span>
        un libro y ubicalo  en la pocisión que desees en el orden de <span class="text-primary">"slider principal"</span>
      </div>
    </div>

    <!-- Editor de posiciones -->
    <div>
      <div class="h-4 bg-primary"></div>

      <div class="flex">
        <!-- Orden en el slider -->
        <form :action="url('admin/biblioteca/slider')" method="POST" class="w-3/5 p-4">
          <h2 class="mb-4 font-semibold text-4xl text-primary">Orden del slider principal:</h2>

          <input type="hidden" name="_token" :value="csrfToken">
          <input type="hidden" name="_method" value="PUT">

          <div
            class="flex items-center"
            v-for="(book, i) in localBooksInSlider"
            :key="book.id"
          >
            <input type="hidden" :name="`books[${i}][id]`" :value="book.id" />
            <input type="hidden" :name="`books[${i}][position]`" :value="i + 1" />

            <!-- Numeración -->
            <p class="mr-6 font-semibold text-6xl">
              {{ i + 1 }}
              <!-- Botón de remover del slide -->
              <button
                type="button"
                class="focus:outline-none text-primary text-4xl"
                @click="removeBookFromSlider(book)"
              >
                <i class="fas fa-arrow-right"></i>
              </button>
            </p>

            <!-- Book card -->
            <BookCard class="mb-6 w-full" :card="book.cardWithAccessors" />

            <!-- Botones de arriba posición -->
            <div class="px-1">
              <button
                type="button"
                class="focus:outline-none text-primary text-4xl"
                @click="moveBookUp(book)"
              >
                <i class="fas fa-arrow-up"></i>
              </button>

              <button
                type="button"
                class="focus:outline-none text-primary text-4xl"
                @click="moveBookDown(book)"
              >
                <i class="fas fa-arrow-down"></i>
              </button>
            </div>
          </div>

          <div class="text-right">
            <button type="submit" class="inline-block px-6 py-3 rounded-md bg-primary font-semibold text-white mr-6">
              Guardar
            </button>
          </div>
        </form>

        <div class="w-4 bg-primary"></div>

        <!-- Lista de libros -->
        <div class="w-2/5 p-5">
          <h2 class="mb-4 font-semibold text-4xl text-primary">Lista de libros:</h2>

          <ul class="list-reset">
            <li
              class="px-2 py-1 odd:bg-gray-300 even:bg-gray-400"
              v-for="(book, i) in localBooksNotInSlider"
              :key="i"
            >
              <!-- Botón de agregar al slide -->
              <button
                type="button"
                class="mr-2 focus:outline-none text-primary"
                @click="addBookToSlider(book)"
              >
                <i class="fas fa-arrow-left"></i>
              </button>

              {{ i + 1 }}-. {{ book.title }}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from '@vue/composition-api';
import { useUrlGenerator } from '@/composables/useUrlGenerator';
import { useMoveArrayItem } from '@/composables/useMoveArrayItem';

export default {
  props: {
    csrfToken: String,
    booksInSlider: {
      type: Array,
      default: () => []
    },
    booksNotInSlider: {
      type: Array,
      default: () => []
    }
  },
  setup(props) {
    const localBooksInSlider = ref(props.booksInSlider.slice());
    const localBooksNotInSlider = ref(props.booksNotInSlider.slice());
    const { moveUp, moveDown } = useMoveArrayItem();
    const url = useUrlGenerator();

    function addBookToSlider(book) {
      const index = localBooksNotInSlider.value.indexOf(book);

      localBooksNotInSlider.value.splice(index, 1);

      localBooksInSlider.value.unshift(book);
    }

    function removeBookFromSlider(book) {
      const index = localBooksInSlider.value.indexOf(book);

      localBooksInSlider.value.splice(index, 1);

      localBooksNotInSlider.value.unshift(book);
    }

    function moveBookDown(book) {
      return localBooksInSlider.value = moveDown(localBooksInSlider.value, book);
    }

    function moveBookUp(book) {
      return localBooksInSlider.value = moveUp(localBooksInSlider.value, book);
    }

    return {
      localBooksInSlider,
      localBooksNotInSlider,
      addBookToSlider,
      removeBookFromSlider,
      moveBookUp,
      moveBookDown,
      url
    }
  }
}
</script>
