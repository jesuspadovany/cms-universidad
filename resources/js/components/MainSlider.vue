<template>
  <div
    class="absolute inset-0"
  >
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
import { computed } from '@vue/composition-api';
import { useSlider } from '@/composables/useSlider';

export default {
  setup() {
    const {
      slides,
      currentSlideIndex,
      previousSlide,
      nextSlide
    } = useSlider([
      'https://i.pinimg.com/originals/87/22/19/872219e39469e56ff5742581122212bf.jpg',
      'https://i.pinimg.com/originals/bf/ae/3f/bfae3fa83ae7efd6b7b56c3df0fac9bf.jpg',
      'https://i.pinimg.com/originals/31/9d/ce/319dce67ea7e656296d9334040a9b991.jpg'
    ]);

    function slidesMapper(currentIndex) {
      return (slide, i) => ({
        styles: { backgroundImage: `url('${slide}')` },
        currentSlide: currentIndex === i
      })
    }

    const slidesToDisplay = computed(() => slides.value.map(slidesMapper(currentSlideIndex.value)));

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
