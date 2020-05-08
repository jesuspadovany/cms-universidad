<template>
  <form :action="url(`admin/biblioteca/${book.id}`)" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" :value="csrfToken">
    <input type="hidden" name="_method" value="PUT">

    <!-- Título -->
    <div class="flex items-center mb-5">
      <label for="title" class="w-1/4">Título del libro</label>
      <input
        type="text"
        name="title"
        id="title"
        placeholder="Título del libro"
        class="form-control w-2/4"
        v-model="bookState.title"
      >
    </div>

    <!-- Sinopsis -->
    <div class="flex items-center mb-5">
      <label for="synopsis" class="w-1/4">Sinopsis</label>
      <textarea
        type="text"
        name="synopsis"
        id="synopsis"
        placeholder="Sinopsis"
        rows="7"
        class="form-control w-2/4"
        v-model="bookState.synopsis"
      ></textarea>
    </div>

    <!-- Autor -->
    <div class="flex items-center mb-5">
      <label for="author" class="w-1/4">Autor</label>
      <input
        type="text"
        name="author"
        id="author"
        placeholder="Autor"
        class="form-control w-2/4"
        v-model="bookState.author"
      >
    </div>

    <!-- Cantidad de páginas -->
    <div class="flex items-center mb-5">
      <label for="num_of_pages" class="w-1/4">Cantidad de páginas</label>
      <input
        type="number"
        name="num_of_pages"
        id="num_of_pages"
        placeholder="Cantidad de páginas"
        class="form-control w-2/4"
        v-model="bookState.numOfPages"
      >
    </div>

    <!-- Fecha de publicacion -->
    <div class="flex items-center mb-5">
      <label for="published_at" class="w-1/4">Fecha de publicacion</label>
      <input
        type="date"
        name="published_at"
        id="published_at"
        placeholder="Fecha de publicacion"
        class="form-control w-2/4"
        v-model="bookState.publishedAt"
      >
    </div>

    <!-- Categoría -->
    <div class="flex items-center mb-5">
      <label for="categories" class="w-1/4">Categoría</label>
      <input
        type="text"
        id="categories"
        placeholder="Asignar categoría"
        readonly
        class="form-control w-2/4"
        :value="bookState.selectedCategoriesText"
        @focus="showSelectCategoryModal = true"
      />
    </div>

    <!-- Ids de las categorias seleccionadas -->
    <input v-for="(category, i) in bookState.selectedCategories"
      :key="category.id"
      type="hidden"
      :name="`categories[${i}]`"
      :value="category.id"
    />

    <!-- Es gratuito -->
    <div class="flex items-center mb-5">
      <label for="is_free" class="w-1/4">¿Es gratuito?</label>
      <select
        name="is_free"
        id="is_free"
        class="form-control w-2/4 bg-transparent"
        v-model="bookState.isFree"
      >
        <option value="" disabled selected>Seleccione una opción</option>
        <option value="si">si</option>
        <option value="no">no</option>
      </select>
    </div>

    <!-- Precio -->
    <div
      v-show="bookState.isFree === 'no'"
      class="flex items-center mb-5"
    >
      <label for="price" class="w-1/4">Precio (AR)</label>
      <input
        type="number"
        name="price"
        id="price"
        placeholder="Precio"
        class="form-control w-2/4"
        v-model="bookState.price"
      />
    </div>

    <!-- Disponible online -->
    <div class="flex items-center mb-5">
      <label for="is_available_online" class="w-1/4">¿Es electrónico?</label>
      <select
        name="is_available_online"
        id="is_available_online"
        class="form-control w-2/4 bg-transparent"
        v-model="bookState.isElectronic"
      >
        <option value="" disabled selected>Seleccione una opción</option>
        <option value="si">si</option>
        <option value="no">no</option>
      </select>
    </div>

    <!-- Ubicacion -->
    <div
      v-show="bookState.isElectronic === 'no'"
      class="flex items-center mb-5"
    >
      <label for="location" class="w-1/4">Ubicación</label>
      <input
        type="text"
        name="location"
        id="location"
        placeholder="Ubicación"
        class="form-control w-2/4"
        :value="bookState.location"
      >
    </div>

    <!-- Archivo -->
    <div
      v-show="bookState.isElectronic === 'si'"
      class="flex items-center mb-5"
    >
      <label for="file" class="w-1/4">Agregar archivo</label>
      <input
        type="file"
        name="file"
        id="file"
        placeholder="Agregar archivo"
        class="form-control w-2/4"
      />
    </div>

    <div class="text-right mt-6">
      <button type="submit" class="inline-block px-6 py-3 rounded-md bg-primary font-semibold text-white mr-6">
        Guardar
      </button>
    </div>

    <ModalSelectCategory
      v-show="showSelectCategoryModal"
      :categories="categories"
      :current-categories="bookState.selectedCategories"
      @accepted="onCategoriesSelected"
    />
  </form>
</template>

<script>
import { ref, reactive, computed } from '@vue/composition-api';
import { useUrlGenerator } from '@/composables/useUrlGenerator';
import { useOldInput } from '@/composables/useOldInput';

export default {
  props: {
    csrfToken: {
      type: String,
      required: true
    },
    categories: {
      type: Array,
      default: () => []
    },
    book: {
      type: Object,
      required: true
    },
    oldData: {
      type: Object,
      default: () => ({})
    },
  },
  setup(props) {
    const showSelectCategoryModal = ref(false);
    const { book, oldData } = props;
    const old = useOldInput(oldData);

    const currentCategoriesIds = old('categories', book.categories.map(cate => cate.id));

    const bookState = reactive({
      selectedCategories: props.categories.filter(cate =>  currentCategoriesIds.some(id => Number(id) === cate.id) ),
      selectedCategoriesText: computed(() => bookState.selectedCategories.map(cate => cate.name).join(', ')),
      title: old('title', book.title),
      synopsis: old('synopsis', book.synopsis),
      author: old('author', book.author),
      numOfPages: old('num_of_pages', book.num_of_pages),
      publishedAt: old('published_at', book.published_at),
      isFree: old('is_free', book.is_free ? 'si' : 'no'),
      price: old('price', book.price),
      isElectronic: old('is_electronic', book.isElectronic ? 'si' : 'no'),
      location: old('location', book.location),
    });

    function onCategoriesSelected(categories) {
      showSelectCategoryModal.value = false;

      bookState.selectedCategories = categories;
    }

    return {
      url: useUrlGenerator(),
      showSelectCategoryModal,
      onCategoriesSelected,
      bookState,
    };
  }
}
</script>
