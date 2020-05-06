<template>
  <div class="relative">
    <button
      v-if="!inputShown"
      type="button"
      class="focus:outline-none"
      @click="$emit('showInput')"
    >
      <i class="fa fa-search"></i>
    </button>

    <template v-if="inputShown">
      <input
        type="text"
        class="w-64 pl-3 pr-8 py-2 leading-none rounded-md focus:outline-none border-2 bg-primary text-white text-sm"
        placeholder="Buscar"
        ref="inputEl"
        :value="value"
        @input="$emit('input', $event.target.value)"
      >
      <span class="absolute inset-y-0 right-0 inline-flex items-center justify-center px-1 text-white">
        <button
          type="button"
          class="px-2 focus:outline-none"
          @click="$emit('hideInput')"
        >
          <i class="fa fa-times"></i>
        </button>
      </span>
    </template>
  </div>
</template>

<script>
import { ref, watchEffect } from '@vue/composition-api';

export default {
  props: {
    value: {
      type: String,
      default: '',
    },
    inputShown: {
      type: Boolean
    }
  },
  setup(props) {
    const inputEl = ref(null);

    watchEffect(() => {
      if (!props.inputShown) {
        return;
      }

      inputEl.value && inputEl.value.focus();
    });

    return { inputEl };
  }
}
</script>

<style scoped>
::placeholder {
  @apply text-white;
}
</style>
