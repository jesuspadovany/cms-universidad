<template>
  <div class="bg-gray-300 rounded-lg overflow-hidden">
    <!-- Body -->
    <div class="flex h-40">
      <!-- Image -->
      <div class="flex-shrink-0 flex w-32 bg-gray-400">
        <img :src="url(book.image)" class="inline h-32 m-auto shadow-md">
      </div>
      <!-- Content -->
      <div class="p-4 w-full">
        <h3 class="text-xl mb-2">{{ book.title }}</h3>

        <p>
          {{ truncate(book.description, 182) }}
        </p>
      </div>
    </div>
    <!-- Footer -->
    <div class="flex px-3 py-2 bg-primary font-semibold text-white">
      <span v-if="book.is_free">Gratis</span>
      <span v-else>{{ book.price }} AR</span>

      <a href="#" class="ml-auto" v-if="book.is_free">
        Leer
      </a>
      <a href="#" class="ml-auto" v-else>
        Comparar
      </a>
    </div>
  </div>
</template>

<script>
import { useUrlGenerator } from '@/composables/useUrlGenerator';
import { useTruncateText } from '@/composables/useTruncateText';

export default {
  props: {
    book: {
      type: Object,
      required: true,
    }
  },
  setup() {
    const url = useUrlGenerator();
    const truncate = useTruncateText();

    return {
      truncate,
      url
    }
  }
}
</script>
