require('./bootstrap');

window.Vue = require('vue');

window.EventBus = new Vue()

Vue.component('post-form', require('./components/PostComponent.vue').default);
Vue.component('post-list', require('./components/PostListComponent.vue').default);

import auth from './mixins/auth'

Vue.mixin(auth)

const app = new Vue({
    el: '#app',
});
