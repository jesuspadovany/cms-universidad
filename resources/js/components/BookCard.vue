<template>
  <div class="card">
    <!-- Body -->
    <div class="flex h-56">
      <!-- Image -->
      <div class="flex-shrink-0 flex w-40 p-3 bg-gray-400">
        <a :href="url(card.book_url)">
          <img :src="url(card.book_image)" class="image">
        </a>
      </div>

      <!-- Content -->
      <div class="p-4 w-full overflow-hidden text-sm">
        <!-- Nombre del libro -->
        <h3 class="mb-3 leading-none capitalize text-xl">
          <a :href="url(card.book_url)">
            {{ card.book_title }}
          </a>
        </h3>

        <!-- Short description -->
        <p class="font-semibold" v-if="card.short_description">
          {{ card.short_description }}
        </p>

        <!-- Short text -->
        <p>
          {{ card.short_text }}
        </p>

        <p class="mt-3 whitespace-pre-wrap" :title="card.long_description">{{ card.long_description }}</p>
      </div>
    </div>

    <!-- Footer -->
    <div class="flex px-3 py-2 bg-primary font-semibold text-white">
      <span v-if="card.book_is_free">Gratis</span>
      <span v-else>${{ card.book_price }}</span>

      <a href="#" class="ml-auto" v-if="card.book_is_free">
        Descargar
      </a>
      <a href="#" class="ml-auto" v-else>
        Comprar
      </a>
    </div>
  </div>
</template>

<script>
import { useUrlGenerator } from '@/composables/useUrlGenerator';

export default {
  props: {
    card: {
      type: Object,
      required: true,
    },
  },
  setup() {

    return {
      url: useUrlGenerator(),
    };
  }
}
</script>

<style lang="scss" scoped>
.card {
  @apply .bg-gray-300 .rounded-lg .overflow-hidden;
  box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.38);
}

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
