<template>
  <nav class="navbar">
    <a :href="url('')" class="text-xl hover:no-underline font-belgrano">el Rojas</a>

    <div class="flex items-center ml-auto">
      <div v-show="!showSearchInput">
        <a :href="url('agenda')" class="mr-4 font-semibold hover:no-underline">Agenda</a>
        <a :href="url('cursos')" class="mr-4 font-semibold hover:no-underline">Cursos</a>
        <a :href="url('biblioteca')" class="font-semibold hover:no-underline">Biblioteca</a>
      </div>

      <SearchInput
        class="mx-4"
        :input-shown="showSearchInput"
        v-model="searchTerm"
        @hideInput="showSearchInput = false , showExpandableSearch = false"
        @showInput="showSearchInput = true , showExpandableSearch = true"
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
      <ExpandableSearch class="expandable-search absolute z-10" v-show="showExpandableSearch" />
    </transition>

    <transition name="scale-y">
      <ExpandableMenu class="expandable-menu absolute z-10" v-show="showExpandableMenu" />
    </transition>
  </nav>
</template>

<script>
import { debounce } from 'lodash';
import { ref, watch } from '@vue/composition-api';
import { useUrlGenerator } from '@/composables/useUrlGenerator';

export default {
  setup() {
    const { searchTerm } = useNavbarSearch();
    const url = useUrlGenerator();
    const showSearchInput = ref(false);
    const showExpandableSearch = ref(false);
    const showExpandableMenu = ref(false);

    return {
      showSearchInput,
      showExpandableMenu,
      showExpandableSearch,
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
.navbar {
  @apply .relative .z-20 .flex .items-center .px-10 .h-16 .bg-primary .text-white .shadow-md;
  background-image: url('/images/logo-navbar.svg');
  background-repeat: no-repeat;
  background-size: auto 65px;
  background-position: -27px;
}

.expandable-search{
  top: 100%;
  left: 0;
  right: 0;
  min-height: 550px;
}

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
