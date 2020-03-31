<template>
  <nav class="relative z-20 flex items-center p-3 bg-primary text-white shadow-md">
    <a :href="url('')" class="text-xl">el Rojas</a>

    <div class="flex items-center ml-auto">
      <div v-show="!showSearchInput">
        <a :href="url('agenda')" class="mr-2 font-semibold">Agenda</a>
        <a :href="url('cursos')" class="mr-2 font-semibold">Cursos</a>
        <a :href="url('biblioteca')" class="font-semibold">Biblioteca</a>
      </div>

      <SearchInput
        class="mx-4"
        :input-showned="showSearchInput"
        v-model="searchTerm"
        @hideInput="showSearchInput = false"
        @showInput="showSearchInput = true"
      />

      <button
        type="button"
        class="inline-block w-6 text-center focus:outline-none"
        @click="showExpandableMenu = !showExpandableMenu"
      >
        <i class="fa fa-lg" :class="showExpandableMenu ? 'fa-times' : 'fa-bars'"></i>
      </button>
    </div>

    <transition name="scale-y">
      <ExpandableMenu class="expandable-menu absolute z-10" v-show="showExpandableMenu" />
    </transition>
  </nav>
</template>

<script>
import { debounce } from 'lodash';
import { ref, watch } from '@vue/composition-api';
import { useUrlGenerator } from '@/composables/useUrlGenerator';
import SearchInput from '@/components/SearchInput';
import ExpandableMenu from '@/components/ExpandableMenu';

export default {
  components: {
    SearchInput,
    ExpandableMenu
  },
  setup() {
    const { searchTerm } = useNavbarSearch();
    const url = useUrlGenerator();
    const showSearchInput = ref(false);
    const showExpandableMenu = ref(false);

    return {
      showSearchInput,
      showExpandableMenu,
      url,
      searchTerm,
    }
  }
}

function useNavbarSearch(debounceTime = 300) {
  const searchTerm = ref('');

  watch(searchTerm, debounce(() => {
    console.log(searchTerm.value);
  }, debounceTime));

  return {
    searchTerm
  }
}
</script>

<style scoped>
.expandable-menu {
  top: 100%;
  left: 0;
  right: 0;
  min-height: 550px;
}

.scale-y-enter-active {
  transform-origin: top;
  animation: scale-y 250ms;
}

.scale-y-leave-active {
  transform-origin: top;
  animation: scale-y 250ms reverse;
}

@keyframes scale-y {
  from {
    transform: scaleY(0);
  }
  to {
    transform: scaleY(1);
  }
}
</style>
