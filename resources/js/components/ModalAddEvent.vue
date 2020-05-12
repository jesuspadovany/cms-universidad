<template>
  <BaseModal
    @backdrop-clicked="$emit('backdrop-clicked')"
  >
    <div class="p-4">
      <h3 class="text-center">Agregar horario</h3>

      <!-- ¿Es recurrente? -->
      <div class="form-group">
        <label for="is_recurrent">¿Es recurrente?</label>
        <select
          class="form-control"
          id="is_recurrent"
          v-model="formState.isRecurring"
        >
          <option :value="true">Si</option>
          <option :value="false">No</option>
        </select>
      </div>

      <!-- Dias de la semana -->
      <div class="form-group text-center" v-show="formState.isRecurring">
        <label>Dias de la semana</label>
        <div class="inline-flex">
          <button
            type="button"
            class="btn-day"
            @click="toggleDay(1)"
            :class="{ 'btn-day--selected' : formState.daysOfWeek.includes(1) }"
          >
            <span>Lun</span>
          </button>
          <button
            type="button"
            class="btn-day"
            @click="toggleDay(2)"
            :class="{ 'btn-day--selected' : formState.daysOfWeek.includes(2) }"
          >
            <span>Mar</span>
          </button>
          <button
            type="button"
            class="btn-day"
            @click="toggleDay(3)"
            :class="{ 'btn-day--selected' : formState.daysOfWeek.includes(3) }"
          >
            <span>Mie</span>
          </button>
          <button
            type="button"
            class="btn-day"
            @click="toggleDay(4)"
            :class="{ 'btn-day--selected' : formState.daysOfWeek.includes(4) }"
          >
            <span>Jue</span>
          </button>
          <button
            type="button"
            class="btn-day"
            @click="toggleDay(5)"
            :class="{ 'btn-day--selected' : formState.daysOfWeek.includes(5) }"
          >
            <span>Vie</span>
          </button>
          <button
            type="button"
            class="btn-day"
            @click="toggleDay(6)"
            :class="{ 'btn-day--selected' : formState.daysOfWeek.includes(6) }"
          >
            <span>Sab</span>
          </button>
          <button
            type="button"
            class="btn-day"
            @click="toggleDay(0)"
            :class="{ 'btn-day--selected' : formState.daysOfWeek.includes(0) }"
          >
            <span>Dom</span>
          </button>
        </div>
      </div>

      <!-- Fecha inicial -->
      <div class="form-group">
        <label for="start_date">
          {{ formState.isRecurring                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ? 'Fecha inicial' : 'Fecha' }}
        </label>
        <input
          type="date"
          class="form-control"
          id="start_date"
          v-model="formState.startDate"
          @keypress.enter.prevent
        />
      </div>

      <!-- Fecha final -->
      <div class="form-group" v-show="formState.isRecurring                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ">
        <label for="end_date">Fecha final</label>
        <input
          type="date"
          class="form-control"
          id="end_date"
          v-model="formState.endDate"
          @keypress.enter.prevent
        />
      </div>

      <!-- Hora de entrada -->
      <div class="form-group">
        <label for="start_time">Hora de entrada</label>
        <input
          type="time"
          class="form-control"
          id="start_time"
          v-model="formState.startTime"
          @keypress.enter.prevent
        />
      </div>

      <!-- Hora de salida -->
      <div class="form-group">
        <label for="end_time">Hora de salida</label>
        <input
          type="time"
          class="form-control"
          id="end_time"
          v-model="formState.endTime"
          @keypress.enter.prevent
        />
      </div>

      <!-- Botones -->
      <div class="text-right">
        <!-- Boton de cancelar -->
        <button
          type="button"
          class="btn btn-gray"
          @click="$emit('canceled')"
        >
          Cancelar
        </button>

        <!-- Boton de aceptar -->
        <button
          type="button"
          class="btn btn-primary"
          @click="onAccepted"
        >
          Aceptar
        </button>
      </div>
    </div>
  </BaseModal>
</template>

<script>
import { ref, reactive } from '@vue/composition-api';
import { format } from 'date-fns';

export default {
  props: {
    initialDate: {
      type: String,
      default: () => format(new Date(), 'yyyy-MM-dd'),
    },
  },
  setup(props, { emit }) {
    const formState = reactive({
      startDate: props.initialDate,
      endDate: props.initialDate,
      startTime: '07:00',
      endTime: '08:00',
      isRecurring: false,
      daysOfWeek: [],
    });

    function onAccepted() {
      emit('add-event', formState);
    }

    function toggleDay(dayNum) {
      if (dayNum < 0 || dayNum > 6) return;

      if (formState.daysOfWeek.includes(dayNum)) {
        const index = formState.daysOfWeek.indexOf(dayNum);

        formState.daysOfWeek.splice(index, 1);

        return;
      }

      formState.daysOfWeek.push(dayNum);
    }

    return {
      formState,
      onAccepted,
      toggleDay,
    };
  },
}
</script>

<style lang="scss" scoped>
.btn-day {
  @apply .inline-flex .w-10 .h-10 .bg-gray-300 .text-sm;

  &:hover, &--selected {
    @apply .bg-gray-400;
  }

  &:focus {
    @apply .z-10 .outline-none .shadow-outline;
  }

  &:first-child {
    @apply .rounded-l-md;
  }

  &:last-child {
    @apply .rounded-r-md;
  }

  & > span {
    @apply .m-auto .leading-none;
  }
}
</style>
