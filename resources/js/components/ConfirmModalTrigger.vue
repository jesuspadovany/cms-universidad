<template>
  <div>
    <slot
      :hide="hide"
      :show="show"
      :showModal="showModal"
    ></slot>

    <ConfirmModal
      v-if="showModal"
      @cancel="showModal = false"
      @accept="$emit('accept')"
    />
  </div>
</template>

<script>
import { ref } from '@vue/composition-api';

export default {
  setup() {
    const showModal = ref(false);

    const hide = () => showModal.value = false;
    const show = () => showModal.value = true;

    return {
      showModal,
      hide,
      show
    }
  }
}
</script>
