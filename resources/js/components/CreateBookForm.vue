<template>
  <form :action="url('admin/biblioteca/crear')" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" :value="csrfToken">

    <!-- Título -->
    <div class="flex items-center mb-5">
      <label for="title" class="w-1/4">Título del libro</label>
      <input
        type="text"
        name="title"
        id="title"
        placeholder="Título del libro"
        class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
      >
    </div>

    <!-- Descripción -->
    <div class="flex items-center mb-5">
      <label for="description" class="w-1/4">Descripción</label>
      <textarea
        type="text"
        name="description"
        id="description"
        placeholder="Descripción"
        rows="4"
        class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
      ></textarea>
    </div>

    <!-- Categoría -->
    <div class="flex items-center mb-5">
      <label for="categories" class="w-1/4">Categoría</label>
      <input
        type="text"
        id="categories"
        placeholder="Asignar categoría"
        readonly
        class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
        :value="selectedCategoriesText"
        @focus="showSelectCategoryModal = true"
      />
    </div>

    <input v-for="(category, i) in selectedCategories"
      :key="category.id"
      type="hidden"
      :name="`categories[${i}]`"
      :value="category.id"
    />

    <!-- Tipo de venta -->
    <div class="flex items-center mb-5">
      <label for="sell_type" class="w-1/4">Tipo de venta</label>
      <select
        name="sell_type"
        id="sell_type"
        class="w-2/4 px-2 py-2 bg-transparent focus:outline-none focus:shadow-outline border border-gray-400"
        v-model="sellType"
      >
        <option value="" disabled selected>Seleccione una opción</option>
        <option value="gratuito">gratuito</option>
        <option value="pago">de pago</option>
      </select>
    </div>

    <!-- Precio -->
    <div
      v-show="sellType === 'pago'"
      class="flex items-center mb-5"
    >
      <label for="price" class="w-1/4">Precio</label>
      <input
        type="number"
        name="price"
        id="price"
        placeholder="Precio"
        class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
      />
    </div>

    <!-- Imagen -->
    <div class="flex items-center mb-5">
      <label class="w-1/4" for="image">Imagen</label>
      <div class="w-2/4">
        <InputImageWithPreview name="image" />
      </div>
    </div>

    <div class="text-right mt-6">
      <button type="submit" class="inline-block px-6 py-3 rounded-md bg-primary font-semibold text-white mr-6">
        Guardar
      </button>
    </div>

    <ModalSelectCategory
      v-show="showSelectCategoryModal"
      :categories="categories"
      @accepted="onCategoriesSelected"
    />
  </form>
</template>

<script>
import { ref, computed } from '@vue/composition-api';
import { useUrlGenerator } from '@/composables/useUrlGenerator';

export default {
  props: {
    csrfToken: String,
    categories: Array
  },
  setup(props) {
    const url = useUrlGenerator();
    const showSelectCategoryModal = ref(false);
    const selectedCategories = ref([]);
    const sellType = ref('');

    const selectedCategoriesText = computed(() => selectedCategories.value.map(c => c.name).join(', '));

    function onCategoriesSelected(categories) {
      showSelectCategoryModal.value = false;

      selectedCategories.value = categories;
    }

    return {
      url,
      showSelectCategoryModal,
      selectedCategories,
      onCategoriesSelected,
      selectedCategoriesText,
      sellType
    }
  }
}
</script>
