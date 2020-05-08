<template>
  <div class="card">
    <!-- Body -->
    <div class="flex h-56">
      <!-- Image -->
      <div class="flex-shrink-0 flex w-32 p-3 bg-gray-400">
        <a :href="url(`biblioteca/${book.slug}/${book.id}`)">
          <img :src="url(book.image)" class="image">
        </a>
      </div>

      <!-- Content -->
      <div class="p-4 w-full text-sm">
        <!-- Nombre del libro -->
        <h3 class="mb-3 leading-none capitalize text-xl">
          <a :href="url(`biblioteca/${book.slug}/${book.id}`)">
            {{ book.title }}
          </a>
        </h3>

        <!-- Short description -->
        <p class="font-semibold" v-if="book.card.short_description">
          {{ book.card.short_description }}
        </p>

        <!-- Short text -->
        <p>
          {{ book.card.full_short_text }}
        </p>

        <p class="mt-3">
          {{ book.card.long_description }}
        </p>
      </div>
    </div>

    <!-- Footer -->
    <div class="flex px-3 py-2 bg-primary font-semibold text-white">
      <span v-if="book.is_free">Gratis</span>
      <span v-else>${{ book.price }}</span>

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
    },
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
