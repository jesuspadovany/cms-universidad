<template>
  <div class="relative overflow-hidden">
    <!-- Botones de navegación -->
    <div v-show="slides.length > 0" class="flex items-center justify-end px-2">
      <button class="px-2 focus:outline-none text-primary text-2xl mr-8" @click="previousSlide">
        <i class="fas fa-chevron-left"></i>
      </button>

      <button class="px-2 focus:outline-none text-primary text-2xl" @click="nextSlide">
        <i class="fas fa-chevron-right"></i>
      </button>
    </div>

    <!-- Slide container -->
    <div
      class="slide-container flex"
      ref="slideContainer"
    >
      <!-- Slide -->
      <div
        class="flex-shrink-0 w-full flex flex-wrap"
        v-for="(slide, i) in slides"
        :key="i"
      >
        <!-- Slide items -->
        <div
          class="p-2"
          v-for="(book, j) in slide"
          :key="j"
          :style="colsWithPercentage"
        >
          <BookCard :card="book.cardWithAccessors" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, computed, watchEffect, onMounted, onBeforeUnmount  } from '@vue/composition-api';
import { useRangeFromOneToN } from '@/composables/useRangeFromOneToN';

export default {
  props: {
    numberOfCols: {
      type: Number,
      default: 1
    },
    numberOfRows: {
      type: Number,
      default: 1
    },
    items: {
      type: Array,
      default: []
    }
  },
  setup(props) {
    const numberOfItemsPerSlide = computed(() => props.numberOfCols * props.numberOfRows);

    const numberOfSlides = computed(() => Math.ceil(props.items.length / numberOfItemsPerSlide.value));

    const colsWithPercentage = computed(() => ({ width: `${100 / props.numberOfCols}%` }));

    const slides = computed(() => {
      return useRangeFromOneToN(numberOfSlides.value)
        .map((number, index) =>  props.items.slice(index * numberOfItemsPerSlide.value, number * numberOfItemsPerSlide.value));
    });

    const slideContainer = ref(null);
    const slideContainerTranslateSize = ref(0);
    const currentSlideIndex = ref(0);

    function resizeListener() {
      slideContainerTranslateSize.value = slideContainer.value.offsetWidth;
    }

    onMounted(() => {
      resizeListener();

      window.addEventListener('resize', resizeListener);

      watchEffect((onInvalidate) => {
        const translateAmount = -currentSlideIndex.value * slideContainerTranslateSize.value;

        slideContainer.value.style.transform = `translateX(${translateAmount}px)`;
      });
    });

    onBeforeUnmount(() =>  {
      window.removeEventListener('resize', resizeListener);
    });

    function nextSlide() {
      if (currentSlideIndex.value === slides.value.length - 1) {
        currentSlideIndex.value = 0;
        return;
      }

      currentSlideIndex.value++;
    }

    function previousSlide() {
      if (currentSlideIndex.value === 0) {
        currentSlideIndex.value = slides.value.length - 1;
        return;
      }

      currentSlideIndex.value--;
    }

    return {
      slides,
      colsWithPercentage,
      currentSlideIndex,
      nextSlide,
      previousSlide,
      slideContainer
    }
  }
}
</script>

<style>
.slide-container {
  transition: transform 400ms;
}
</style>
