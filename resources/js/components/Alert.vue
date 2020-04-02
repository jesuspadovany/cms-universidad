<template>
  <div
    class="flex py-3 px-4 rounded font-semibold text-white"
    :class="type === 'success' ? 'bg-green-500' : 'bg-red-600'"
  >
    <p class="w-full">
        {{ message }}
    </p>
    <button type="button" class="flex-shrink-0 inline-block px-2 focus:outline-none">
      <i class="fas fa-times"></i>
    </button>
  </div>
</template>

<script>
export default {
  props: {
    message: String,
    type: {
      type: String,
      validator: (value) => ['success', 'error'].includes(value)
    }
  }
}
</script>
