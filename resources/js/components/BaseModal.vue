<template>
  <div class="modal" @click.self="$emit('backdrop-clicked')">
    <div class="modal__dialog" :class="dialogSize">
      <slot />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    dialogSize: {
      type: String,
      default: 'md',
      validator: val => ['sm', 'md', 'lg'].includes(val),
    }
  },
}
</script>

<style lang="scss" scoped>
.modal {
  @apply .fixed .inset-0 .z-10 .flex .flex-col .p-4 .overflow-y-auto;

  background-color: rgba(0, 0, 0, .5);

  &__dialog {
    @apply .m-auto .rounded-md .bg-white;
    max-width: 100%;

    &.sm {
      width: 350px;
    }

    &.md {
      width: 600px;
    }

    &.lg {
      width: 900px;
    }
  }
}
</style>
