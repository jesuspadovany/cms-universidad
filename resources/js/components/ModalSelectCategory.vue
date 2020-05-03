<template>
  <div class="modal fixed inset-0 flex items-center justify-center p-2">
    <div class="modal-dialog max-h-full p-2 py-3 overflow-y-auto rounded-md bg-white">
      <h2 class="px-6 py-1 font-semibold text-primary text-2xl">
        Filtros
      </h2>

      <!-- Categorias -->
      <div class="flex flex-wrap">
        <div
          class="flex-shrink-0 w-1/2 px-6 py-2 text-xl"
          v-for="category in categories"
          :key="category.id"
        >
          <CheckboxCategory
            :value="category"
            v-model="selectedCategories"
          />
        </div>
      </div>

      <!-- Botón de aceptar -->
      <div class="py-2 text-right">
        <button
          type="button"
          class="inline-block px-3 py-2 rounded-md focus:outline-none focus:shadow-outline bg-primary font-semibold text-white mr-6"
          @click="$emit('accepted', selectedCategories)"
        >
          Aceptar
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from '@vue/composition-api';
import { useRangeFromOneToN } from '@/composables/useRangeFromOneToN';

export default {
  props: {
    categories: Array
  },
  setup(props) {
    const selectedCategories = ref([]);

    return {
      selectedCategories
    }
  }
}
</script>

<style scoped>
.modal {
  background-color: rgba(0, 0, 0, .5);
}

.modal-dialog {
  width: 600px;
  max-width: 100%;
}
</style>
