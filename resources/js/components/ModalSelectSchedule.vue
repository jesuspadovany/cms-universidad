<template>
  <BaseModal
    dialogSize="lg"
    @backdrop-clicked="$emit('backdrop-clicked')"
  >
    <div class="p-4">
      <FullCalendar
        @dateClick="onDateClick"
        :defaultView="calendarState.defaultView"
        :plugins="calendarState.plugins"
        :events="calendarState.events"
        :editable="true"
      />
    </div>

    <ModalAddEvent
      v-if="modalEventShown"
      @backdrop-clicked="hideModalEvent"
      @canceled="hideModalEvent"
      @add-event="onAddEvent"
      :initial-date="selectedDate"
    />
  </BaseModal>
</template>

<script>
import { reactive, ref } from '@vue/composition-api';
import { format, parse, compareAsc } from 'date-fns';
import FullCalendar from '@fullcalendar/vue';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import { useToggleModal } from '@/composables/useToggleModal';

export default {
  components: {
    FullCalendar,
  },
  props: {
    schedules: {
      type: Array,
      default: () => [],
    },
  },
  setup(props, { emit }) {
    const { shown: modalEventShown, hide: hideModalEvent, show: showModalEvent } = useToggleModal(false);
    const selectedDate = ref(format(new Date(), 'yyyy-MM-dd'));

    const calendarState = reactive({
      defaultView: 'dayGridMonth',
      plugins: [ dayGridPlugin, interactionPlugin ],
      events: props.schedules,
    });

    function onDateClick(info) {
      // Todo: hacer un parse con date-fns en la fecha clickeada
      const clickedDatedIsBeforeNow = compareAsc(new Date(), new Date(info.dateStr)) === 1;

      if (clickedDatedIsBeforeNow) return;

      selectedDate.value = info.dateStr;

      showModalEvent();
    }

    function onAddEvent(event) {
      hideModalEvent();

      const newEvent = {};

      newEvent.title = `${event.startTime} a ${event.endTime}`;

      if (! event.isRecurring) {
        newEvent.start = event.startDate;
      } else {
        newEvent.startRecur = event.startDate;
        newEvent.endRecur = event.endDate;
        newEvent.startTime = event.startTime;
        newEvent.endTime = event.endTime;
        newEvent.daysOfWeek = event.daysOfWeek;
        newEvent.groupId = Date.now();
      }

      calendarState.events.push(newEvent);

      emit('update:schedules', calendarState.events);
    }

    return {
      calendarState,
      onDateClick,
      modalEventShown,
      hideModalEvent,
      selectedDate,
      onAddEvent
    };
  },
}
</script>

<style lang="scss" scoped>
@import '~@fullcalendar/core/main.css';
@import '~@fullcalendar/daygrid/main.css';

.fc-time {
  @apply .hidden;
}
</style>
