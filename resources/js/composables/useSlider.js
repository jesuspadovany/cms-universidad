import { ref } from '@vue/composition-api';

export function useSlider(incomingSlides) {
  if (!Array.isArray(incomingSlides)) {
    console.warn('useSlider: You must provide and array');
  }

  const slides = ref(incomingSlides);

  const currentSlideIndex = ref(0);

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
    currentSlideIndex,
    nextSlide,
    previousSlide
  }
}
