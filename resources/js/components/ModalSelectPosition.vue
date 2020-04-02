<template>
  <div class="modal fixed inset-0 flex items-center justify-center">
    <div class="modal-dialog rounded-md bg-white">
      <h2 class="p-4 text-2xl">Asignar posición</h2>

      <div class="flex flex-wrap">
        <div
          class="flex w-1/4 p-3"
          v-for="position in positions"
          :key="position"
        >
          <span
            class="block w-full py-8 rounded border border-gray-400 text-center text-6xl cursor-pointer"
            @click="$emit('position-selected', position)"
          >
              {{ position }}
            </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    amountOfPositions: {
      type: Number,
      default: 0
    }
  },
  setup(props) {
    const positions = useRangeFromOneToN(props.amountOfPositions);

    return {
      positions
    }
  }
}

function useRangeFromOneToN(numberOfItems) {
  return Array.from(Array(numberOfItems + 1).keys()).slice(1);
}
</script>

<style scoped>
.modal {
  background-color: rgba(0, 0, 0, .5);
}

.modal-dialog {
  width: 600px;
  max-width: 100%;
}
</style>
