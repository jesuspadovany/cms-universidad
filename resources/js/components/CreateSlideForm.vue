<template>
  <div>
    <form :action="url('admin/slider/crear')" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token" :value="csrfToken">

      <!-- Titulo -->
      <div class="flex items-center mb-5">
        <label for="title" class="w-1/4">Título de imagen</label>
        <input
          type="text"
          name="title"
          id="title"
          placeholder="Título de imagen"
          class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
        >
      </div>

      <!-- Descripción -->
      <div class="flex items-center mb-5">
        <label for="description" class="w-1/4">Descripción de imagen</label>
        <input
          type="text"
          name="description"
          id="description"
          placeholder="Descripción de imagen"
          class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
        >
      </div>

      <!-- Posición -->
      <div class="flex items-center mb-5">
        <label for="position" class="w-1/4">Asignar posición</label>
        <input
          type="number"
          name="position"
          id="position"
          placeholder="Asignar posición"
          class="w-2/4 px-2 py-2 focus:outline-none focus:shadow-outline border border-gray-400"
          readonly
          :value="asignedPosition"
          @click="showPositionsModal = true"
        >
      </div>

      <!-- Imagen -->
      <div class="flex items-center mb-5">
        <label class="w-1/4" for="image">Imagen</label>
        <div class="w-2/4">
          <InputImageWithPreview
            name="image"
            @image-changed="imageUrl = $event"
          />
        </div>
      </div>

      <!-- Posiciones de cada slide -->
      <div v-for="(slide, i) in slidesPosition">
        <input
          type="hidden"
          :name="`slides_positions[${i}][id]`"
          :value="slide.id"
        />
        <input
          type="hidden"
          :name="`slides_positions[${i}][position]`"
          :value="slide.position"
        />
      </div>

      <!-- Botón de enviar -->
      <div class="text-right mt-6">
        <button type="submit" class="inline-block px-6 py-3 rounded-md bg-primary font-semibold text-white mr-6">
          Guardar
        </button>
      </div>
    </form>

    <div class="h-4 my-6 bg-primary"></div>

    <!-- Lista de imagenes del slider -->
    <div class="flex flex-wrap">
      <div
        class="w-1/3 p-2"
        v-for="slide in localSlides"
        :key="slide.id"
      >
        <img :src="url(slide.image, false)" class="block w-full h-40">
      </div>
    </div>

    <ModalSelectPosition
      v-show="showPositionsModal"
      :amount-of-positions="slides.length + 1"
      @position-selected="asignedPosition = $event"
    />
  </div>
</template>

<script>
import { ref, computed, watch } from '@vue/composition-api';
import { useUrlGenerator } from '@/composables/useUrlGenerator';

export default {
  props: {
    csrfToken: String,
    slides: Array
  },
  setup(props) {
    const { asignedPosition, imageUrl, localSlides, slidesPosition } = useImagePosition(props.slides);
    const url = useUrlGenerator();
    const showPositionsModal = ref(false);

    watch(asignedPosition, () => showPositionsModal.value = false);

    return {
      url,
      showPositionsModal,
      asignedPosition,
      localSlides,
      imageUrl,
      slidesPosition
    }
  }
}

function useImagePosition(slides) {
  const asignedPosition = ref(slides.length + 1);
  const imageUrl = ref(null);

  const localSlides = computed(() => {
    const mappedSlides = slides.map(slide => ({
      id: slide.id,
      image: slide.image
    }));

    if (imageUrl.value) {
      mappedSlides.splice(asignedPosition.value - 1, 0, { id: 0, image: imageUrl.value })
    }

    return mappedSlides;
  });

  const slidesPosition = computed(() => {
    return localSlides.value
      .map((slide, i) => ({ id: slide.id, position: i + 1 }))
      .filter(slide => slide.id !== 0);
  });

  return {
    asignedPosition,
    imageUrl,
    localSlides,
    slidesPosition
  }
}
</script>
