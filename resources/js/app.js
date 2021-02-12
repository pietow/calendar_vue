require('./bootstrap');
require('alpinejs');
import Vue from 'vue';

window.Vue = require('vue');

import { library } from '@fortawesome/fontawesome-svg-core'
import { faChevronLeft } from '@fortawesome/free-solid-svg-icons'
import { faChevronRight } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faChevronLeft)
library.add(faChevronRight)

Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false

Vue.component('calendar-component', require('./components/CalendarComponent.vue').default);
Vue.component('month-component', require('./components/MonthComponent.vue').default);
Vue.component('popup-component', require('./components/PopupComponent.vue').default);
Vue.component('modal', require('./components/modal.vue').default);

const app = new Vue({
    el: '#app',
});
