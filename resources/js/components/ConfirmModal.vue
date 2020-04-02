<template>
  <div class="modal fixed inset-0 z-50 flex items-center justify-center">
    <div class="modal-dialog rounded-md bg-white">
      <h2 class="p-2 border-b border-gray-400 text-2xl text-center">¿Está seguro?</h2>

      <div class="flex p-3">
        <button
          type="button"
          class="w-1/2 inline-block px-5 py-2 focus:outline-none focus:shadow-outline rounded-md bg-gray-700 font-semibold text-white mr-4"
          @click="$emit('cancel')"
        >
          Cancelar
        </button>
        <button
          type="button"
          class="w-1/2 inline-block px-5 py-2 focus:outline-none focus:shadow-outline rounded-md bg-green-500 font-semibold text-white"
          @click="$emit('accept')"
        >
          Aceptar
        </button>
      </div>
    </div>
  </div>
</template>

<style scoped>
.modal {
  background-color: rgba(0, 0, 0, .5);
}

.modal-dialog {
  width: 300px;
  max-width: 100%;
}
</style>
