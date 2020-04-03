<template>
  <label
    class="relative block w-full pb-1 border-b-4 border-gray-400 hover:border-primary cursor-pointer text-left hover:text-primary"
    :class="{ 'selected-category': isChecked }"
  >
    <span class="check-icon absolute" v-show="isChecked">
      <i class="fas fa-check-circle"></i>
    </span>
    <input
      type="checkbox"
      class="hidden"
      :checked="isChecked"
      @change="onChange"
    />
    {{ value.name }}
  </label>
</template>

<script>
import { useCustomCheckbox } from '@/composables/useCustomCheckbox';

export default {
  model: {
    prop: 'checked',
    event: 'change'
  },
  props: {
    checked: [Boolean, Array],
    value: Object
  },
  setup(props, { emit }) {
    const { isChecked, onChange } = useCustomCheckbox(props, emit);

    return {
      isChecked,
      onChange
    }
  }
}
</script>

<style>
.check-icon {
  right: calc(100% + 5px);
}

.selected-category {
  @apply .text-primary .border-primary;
}
</style>
