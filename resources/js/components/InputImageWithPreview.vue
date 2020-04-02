<template>
  <div class="text-center">
    <input
      class="hidden"
      type="file"
      ref="inputFile"
      :name="name"
      :id="name"
      @change="fileSelected"
    />

    <div>
      <button
        type="button"
        class="inline-block px-5 py-2 rounded-md bg-primary font-semibold text-white mr-6"
        @click="$refs.inputFile.click()"
      >
          Agregar imagen
      </button>
      <button
        type="button"
        class="inline-block px-5 py-2 rounded-md bg-primary font-semibold text-white mb-6"
        @click="removeSelectedFile"
      >
          Eliminar imagen
      </button>
    </div>

    <img v-if="imageUrl" :src="imageUrl" class="w-full">
  </div>
</template>

<script>
import { ref, watch } from '@vue/composition-api';

export default {
  props: {
    name: String
  },
  setup(props, { emit }) {
    const inputFile = ref(null);
    const imageUrl = ref(null);
    const validFileTypes = ['image/png', 'image/gif', 'image/jpeg'];

    function fileSelected(e) {
      const files = e.target.files;

      if (files.length === 0) {
        imageUrl.value = null;
        return;
      }

      if (! validFileTypes.includes(files[0].type)) {
        removeSelectedFile();
        return;
      }

      imageUrl.value = URL.createObjectURL(files[0]);
    }

    function removeSelectedFile() {
      inputFile.value.value = null;

      imageUrl.value = null;
    }

    watch(imageUrl, (imageUrl, prevImageUrl) => {
      if (imageUrl !== prevImageUrl) {
        emit('image-changed', imageUrl);
      }
    });

    return {
      inputFile,
      imageUrl,
      fileSelected,
      removeSelectedFile
    }
  }
}
</script>
