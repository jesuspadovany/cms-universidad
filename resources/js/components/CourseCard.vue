<template>
  <div class="card">
    <!-- Body -->
    <div class="flex h-56">
      <!-- Image -->
      <div class="flex-shrink-0 flex w-40 bg-gray-400">
        <a :href="url(`/cursos/${course.slug}/${course.id}`)" class="block w-full h-full">
          <img :src="url(course.imagen)" class="image">
        </a>
      </div>

      <!-- Content -->
      <div class="flex flex-col p-4 w-full overflow-hidden text-sm">
        <!-- Nombre del libro -->
        <h3 class="mb-3 leading-none capitalize text-xl">
          <a :href="url(`/cursos/${course.id}`)">
            {{ course.nombre }}
          </a>
        </h3>

        <!-- Short description -->
        <p class="font-semibold" v-if="course.card.short_description">
          {{ course.card.short_description }}
        </p>

        <!-- Short text -->
        <p>
          {{ course.card.short_text }}
        </p>

        <p class="mt-3 whitespace-pre-wrap" :title="course.card.long_description">{{ course.card.long_description }}</p>

        <p class="mt-auto">
          <a
            href="#"
            class="uppercase font-semibold text-primary"
            v-for="(category, index) in course.categories"
            :key="category.id"
          >
            {{ `${category.name}${ index < course.categories.length - 1 ? ', ' : '' }` }}
          </a>
        </p>
      </div>
    </div>

    <!-- Footer -->
    <div class="flex px-3 py-2 bg-primary font-semibold text-white">
      <span v-if="course.is_free">Gratis</span>
      <span v-else>${{ course.price }}</span>

      <a href="#" class="ml-auto">
        Inscribete
      </a>
    </div>
  </div>
</template>

<script>
import { useUrlGenerator } from '@/composables/useUrlGenerator';

export default {
  props: {
    course: {
      type: Object,
      required: true,
    },
  },
  setup() {
    return {
      url: useUrlGenerator(),
    };
  },
}
</script>

<style scoped>
.card {
  @apply .bg-gray-300 .rounded-lg .overflow-hidden;
  box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.38);
}

.image {
  @apply .inline .h-full .w-full;
}
</style>
