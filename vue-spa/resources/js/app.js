import Vue from 'vue';
import VueRouter from 'vue-router';

import routes from './routes';

// Adding Vue Router as a plugin
Vue.use(VueRouter);

const app = new Vue({
    el: '#app',

    router: new VueRouter(routes) // 'routes' imported above
});

