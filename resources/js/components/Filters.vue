<template>
  <div class="inline-block relative">
    <button
      type="button"
      class="filters__btn"
      :class="{ 'filters__btn--active': expandedRef || active }"
      @click="expandedRef = ! expandedRef"
    >
      Filtrar por
      <i class="fas fa-caret-down"></i>
    </button>

    <ul class="filters__dropdown" v-show="expandedRef">
      <slot></slot>
    </ul>
  </div>
</template>

<script>
import { ref } from '@vue/composition-api';

export default {
  props: {
    active: {
      type: Boolean,
      default: false
    }
  },
  setup(props) {
    const expandedRef = ref(false);

    return {
      expandedRef
    };
  }
}
</script>

<style lang="scss" scoped>
.filters {
    &__dropdown {
        @apply .list-none .absolute .right-0 .px-8 .py-6 .rounded-md .text-white .text-left .text-sm;
        background-color: rgba(#000, .75);
        top: calc(100% + 10px);
    }

    &__btn {
      @apply .px-3 .py-2 .rounded-lg .border-2 .border-primary .font-semibold;

      &:focus {
        @apply .outline-none;
      }

      &--active {
        @apply .bg-primary .text-white;
      }
    }

    &__link {
      @apply .inline-block .py-1 .capitalize;

      &:hover {
        @apply .no-underline;
      }
    }
}

</style>
