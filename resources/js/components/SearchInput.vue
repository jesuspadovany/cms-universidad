<template>
  <div class="relative">
    <button
      v-if="!inputShowned"
      type="button"
      class="focus:outline-none"
      @click="$emit('showInput')"
    >
      <i class="fa fa-search"></i>
    </button>

    <template v-if="inputShowned">
      <input
        type="text"
        class="pl-3 pr-6 py-1 leading-none rounded focus:outline-none text-black"
        ref="inputEl"
        :value="value"
        @input="$emit('input', $event.target.value)"
      >
      <span class="absolute inset-y-0 right-0 inline-flex items-center justify-center text-gray-800">
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
    inputShowned: {
      type: Boolean
    }
  },
  setup(props) {
    const inputEl = ref(null);

    watchEffect(() => {
      if (!props.inputShowned) {
        return;
      }

      inputEl.value && inputEl.value.focus();
    });

    return { inputEl };
  }
}
</script>
