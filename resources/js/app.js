import './bootstrap';
import Vue from 'vue';
import VueCompositionApi from '@vue/composition-api';
import CKEditor from '@ckeditor/ckeditor5-vue';
import '@ckeditor/ckeditor5-build-classic/build/translations/es';

Vue.use(VueCompositionApi);

Vue.use(CKEditor);

Vue.config.productionTip = false;

new Vue({
  el: '#app'
});
