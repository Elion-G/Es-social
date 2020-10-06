require('./bootstrap')

window.Vue = require('vue')

window.EventBus = new Vue()

Vue.component('post-form', require('./components/PostComponent.vue').default)
Vue.component('post-list', require('./components/PostListComponent.vue').default)

import auth from './mixins/auth'
import Toasted from 'vue-toasted'

Vue.mixin(auth)
Vue.use(Toasted)

const app = new Vue({
    el: '#app',
});
