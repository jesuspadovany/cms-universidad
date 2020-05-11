<template>
  <form :action="url(`admin/biblioteca/${card.book_id}/carta`)" method="POST">
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
        v-model="cardState.short_description"
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
        v-model="cardState.short_text"
      >
    </div>

    <!-- Descripción larga -->
    <div class="flex items-center mb-5">
      <label for="long_description" class="w-1/4">Descripción larga</label>
      <textarea
        type="text"
        name="long_description"
        id="long_description"
        placeholder="Descripción larga"
        rows="7"
        class="form-control w-2/4"
        v-model="cardState.long_description"
      ></textarea>
    </div>

    <div class="text-right">
      <button type="submit" class="btn btn-lg btn-primary">
        Guardar
      </button>
    </div>

    <div class="my-2 border border-grey-200"></div>

    <!-- Vista previa -->
    <p class="text-xl">Vista previa</p>

    <div class="flex justify-center">
      <BookCard :card="cardState" class="w-1/2" />
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
    card: {
      type: Object,
      required: true,
    },
    oldData: {
      type: Object,
      default: () => ({}),
    },
  },
  setup(props) {
    const cardState = reactive({
      ...props.card
    });

    return {
      url: useUrlGenerator(),
      cardState
    };
  }
}
</script>
