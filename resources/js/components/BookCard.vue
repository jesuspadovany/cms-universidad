<template>
  <div class="bg-gray-300 rounded-lg overflow-hidden">
    <!-- Body -->
    <div class="flex h-48">
      <!-- Image -->
      <div class="flex-shrink-0 flex w-32 p-3 bg-gray-400">
        <a :href="url(`biblioteca/${book.slug}/${book.id}`)">
          <img :src="url(book.image)" class="image">
        </a>
      </div>

      <!-- Content -->
      <div class="p-4 w-full text-sm">
        <!-- Nombre del libro -->
        <h3 class="mb-2 leading-none capitalize text-xl">
          <a :href="url(`biblioteca/${book.slug}/${book.id}`)">
            {{ book.title }}
          </a>
        </h3>

        <!-- Info del libro -->
        <p>
          <b>Autor:</b>
          <span class="capitalize">{{ book.author }}</span>
        </p>
        <p>
          <b>N° de páginas:</b>
        {{ book.num_of_pages }}
        </p>
        <p>
          <b>Fecha de publicación:</b>
          {{ new Date(book.published_at).toLocaleDateString() }}
        </p>

        <!-- Sinopsis del libro -->
        <p class="sinopsis mt-2" :title="book.description">
          <b>Sinopsis:</b>
          {{ book.description }}
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
        Comprar
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

<style lang="scss" scoped>
.image {
  box-shadow: 3px 3px 3px rgba(0, 0, 0, .4);
  @apply .inline .h-full .w-full;
}

.sinopsis {
  line-height: 1.35rem;
  max-height: 4.05rem;
  overflow: hidden;
}
</style>
