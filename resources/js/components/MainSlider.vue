<template>
  <div class="absolute inset-0">
    <div
      class="slider-image absolute h-full w-full"
      v-for="(slide, i) in slidesToDisplay"
      :key="i"
      :style="slide.styles"
      v-show="slide.currentSlide"
    ></div>

    <div class="relative flex items-center justify-between h-full w-full p-4">
      <button
        class="w-12 h-12 text-white focus:outline-none"
        @click="previousSlide"
      >
        <i class="fas fa-chevron-left fa-3x"></i>
      </button>

      <button
        class="w-12 h-12 text-white focus:outline-none"
        @click="nextSlide"
      >
        <i class="fas fa-chevron-right fa-3x"></i>
      </button>
    </div>
  </div>
</template>

<script>
import { useUrlGenerator } from '@/composables/useUrlGenerator';
import { computed } from '@vue/composition-api';
import { useSlider } from '@/composables/useSlider';

export default {
  props: {
    slides: Array
  },
  setup(props) {
    const { slides, currentSlideIndex, previousSlide, nextSlide } = useSlider(props.slides);
    const url = useUrlGenerator();

    const slidesToDisplay = computed(() => slides.value.map((slide, i) => {
      const slideUrl = url(slide.image, false);

      return {
        styles: { backgroundImage: `url('${slideUrl}')` },
        currentSlide: currentSlideIndex.value === i
      }
    }));

    return {
      previousSlide,
      nextSlide,
      slidesToDisplay
    }
  }
}
</script>

<style scoped>
.slider-image {
  background-repeat: no-repeat;;
  background-size: cover;
  background-position: center center;
}
</style>
