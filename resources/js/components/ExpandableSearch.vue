<template>
  <div style="background: #525252">
    <div class="container mx-auto flex px-10 py-10">
      <!-- Primera columna -->

    </div>
  </div>
</template>

<script>
import { useUrlGenerator } from '@/composables/useUrlGenerator';

export default {
  setup() {
    const url = useUrlGenerator();

    return {
      url
    }
  }
}
</script>

<style lang="stylus">
    
</style>
