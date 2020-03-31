import './bootstrap';
import Vue from 'vue';
import VueCompositionApi from '@vue/composition-api';

Vue.use(VueCompositionApi);

import TheNavbar from './components/TheNavbar';

Vue.component('the-navbar', TheNavbar);

new Vue({
  el: '#app'
});
