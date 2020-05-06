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
    },
    bgSize: {
      type: String,
      default: 'cover'
    }
  },
  setup(props) {
    const url = useUrlGenerator();

    const styles = computed(() => {
      return {
        backgroundImage: `url('${url(props.bgImage, false)}')`,
        backgroundSize: props.bgSize,
      }
    });

    return { styles }
  }
}
</script>

<style scoped>
.hero {
  @apply .h-full;
  background-repeat: no-repeat;
}
</style>
