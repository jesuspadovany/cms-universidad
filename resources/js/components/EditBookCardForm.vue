<template>
  <form :action="url(`admin/${book.id}/card`)" method="POST">
    <input type="hidden" name="_token" :value="csrfToken">
    <input type="hidden" name="_method" value="PUT">

    <!-- Descripción corta -->
    <div class="flex items-center mb-5">
      <label for="short_description" class="w-1/4">Descripción corta</label>
      <input
        type="text"
        name="short_description"
        id="short_description"
        placeholder="Descripción corta"
        class="form-control w-2/4"
      >
    </div>

    <!-- Texto corto -->
    <div class="flex items-center mb-5">
      <label for="short_text" class="w-1/4">Texto corto</label>
      <input
        type="text"
        name="short_text"
        id="short_text"
        placeholder="Texto corto"
        class="form-control w-2/4"
      >
    </div>

    <div class="my-2 border border-grey-200"></div>

    <p class="text-xl">Vista previa</p>

    <div class="flex justify-center">
      <BookCard :book="book" class="w-1/2" />
    </div>
  </form>
</template>

<script>
import { reactive } from '@vue/composition-api';
import { useUrlGenerator } from '@/composables/useUrlGenerator';

export default {
  props: {
    csrfToken: {
      type: String,
      required: true
    },
    book: {
      type: Object,
      required: true,
    },
    oldData: {
      type: Object,
      default: () => ({}),
    },
  },
  setup(props) {
    console.log(props.card)

    const cardState = reactive({

    });

    return {
      url: useUrlGenerator(),
      cardState
    };
  }
}
</script>
