<template>
  <section class="hero" :style="styles"></section>
</template>

<script>
import { useUrlGenerator } from '@/composables/useUrlGenerator';
import { computed } from '@vue/composition-api';

export default {
  props: {
    bgImage: {
      type: String,
      default: '#'
    }
  },
  setup(props) {
    const url = useUrlGenerator();

    const styles = computed(() => {
      return {
        backgroundImage: `url('${url(props.bgImage, false)}')`
      }
    });

    return { styles }
  }
}
</script>

<style scoped>
.hero {
  @apply .h-full;
  background-size: cover;
  background-repeat: no-repeat;
}
</style>
