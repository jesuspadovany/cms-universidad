<template>
  <form :action="url('admin/cursos/crear')" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" :value="csrfToken">

    <div class="grid grid-cols-6 gap-4">
      <div class="md:col-span-4">
        <!-- Ubicación -->
        <div class="flex items-center mb-5">
          <label for="description" class="w-6/12">Ubicacion</label>
          <input
            type="text"
            name="ubicacion"
            id="ubicacion"
            required
            placeholder="Ubicación"
            class="w-full px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
          >
        </div>

        <!-- Título -->
        <div class="flex items-center mb-5">
          <label for="description" class="w-6/12">Nombre del curso</label>
          <input
            type="text"
            name="nombre"
            id="nombre"
            required
            placeholder="Nombre del libro"
            class="w-full px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
          >
        </div>

        <!-- Descripción Curso -->
        <div class="flex items-center mb-5">
          <label for="description" class="w-6/12">Descripción del curso</label>
          <textarea
            type="text"
            name="descripcion_curso"
            id="desciption_curso"
            placeholder="Descripción"
            rows="1"
            required
            class="w-full px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
          ></textarea>
        </div>

        <!-- Descripción Curso -->
        <div class="flex items-center mb-5">
          <label for="description" class="w-6/12">Descripción</label>
          <textarea
            type="text"
            name="descripcion"
            id="description"
            placeholder="Descripción"
            rows="1"
            required
            class="w-full px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
          ></textarea>
        </div>

        <!-- Precio  v-show="sellType === 'pago'"-->
        <div
          class="flex items-center mb-5"
        >
          <label for="price" class="w-6/12">Precio</label>
          <input
            type="number"
            name="precio"
            id="price"
            required
            placeholder="Precio"
            class="w-full px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
          />
        </div>

        <!-- Categoría -->
        <div class="flex items-center mb-5">
          <label for="categories" class="w-6/12">Categoría</label>
          <input
            type="text"
            id="categories"
            name="categories"
            placeholder="Asignar categoría"
            readonly
            required
            class="w-full px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
            :value="selectedCategoriesText"
            @focus="showSelectCategoryModal = true"
          />
        </div>

        <input v-for="(category, i) in selectedCategories"
          :key="category.id"
          type="hidden"
          :name="`categories[${i}]`"
          required
          :value="category.id"
        />

        <!--Horario y fecha -->
        <div class="flex items-center mb-5">
            <label for="price" class="w-6/12">Horario y fecha</label>
            <input
              type="datetime-local"
              name="horario"
              id="price"
              required
              placeholder="Precio"
              class="w-full px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
            />
        </div>
      </div>

      <div class="md:col-span-2">
        <!-- Profesor -->
        <div class="flex items-center mb-5">
          <label for="description" class="w-4/12">Profesor</label>
          <input
            type="text"
            name="profesor"
            id="profesor"
            required
            placeholder="Profesor"
            class="w-full px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
          >
        </div>

        <!-- Anfitrión -->
        <div class="flex items-center mb-5">
          <label for="description" class="w-4/12">Anfitrión</label>
          <input
            type="text"
            name="anfitrion"
            id="anfitrion"
            required
            placeholder="Anfitrion"
            class="w-full px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
          >
        </div>

        <!-- Tipo -->
        <div class="flex items-center mb-5">
          <label for="description" class="w-11/12">Presencial y online</label>
          <select name="tipo" id="tipo" required  class="w-full px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400">
            <option value="" disabled selected>Seleccione un opcion</option>
            <option value="presencial">Presencial</option>
            <option value="online">Online</option>
          </select>
        </div>

        <!--Duración-->
        <div class="flex items-center mb-5">
          <label for="description" class="w-9/12">Duración (horas)</label>
          <input
            type="number"
            name="duracion"
            id="duracion"
            required
            placeholder="Duración"
            class="w-full px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
          >
        </div>
      </div>
    </div>
    <!--Material-->
    <div class="flex items-center mb-5">
      <label for="material" class="w-1/4">Material (Opcional)</label>
      <input type="file"
        class="w-2/4"
        id="material"
        name="material"
      >
    </div>
    <!-- Imagen -->
    <div class="flex items-center mb-5">
      <label class="w-1/4" for="image">Imagen</label>
      <div class="w-2/4">
          <input-image-with-preview name="image"></input-image-with-preview>
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
