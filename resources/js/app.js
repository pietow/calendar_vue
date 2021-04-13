require('./bootstrap');
require('alpinejs');
import Vue from 'vue';
import Vuex from 'vuex';
import storeData from "./store/index.js";
window.Vue = require('vue');

import { library } from '@fortawesome/fontawesome-svg-core'
import { faChevronLeft } from '@fortawesome/free-solid-svg-icons'
import { faChevronRight } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faChevronLeft)
library.add(faChevronRight)

Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false

Vue.use(Vuex);
const store = new Vuex.Store(storeData)

Vue.component('CalendarParent', require('./CalendarParent.vue').default);
Vue.component('ContainerGallery', require('./components/gallery/ContainerGallery.vue').default);
Vue.component('CarouselGallery', require('./components/gallery/CarouselGallery.vue').default);
// Vue.component('calendar-component', require('./components/CalendarComponent.vue').default);


const app = new Vue({
    el: '#app',
    store,
});
