import Home from './component/Home.vue';
import About from './component/About.vue';

export default {
    mode: 'history',

    routes: [
        {
            path: '/',
            component: Home,
        },
        {
            path: '/about',
            component: About,
        }
    ]
};
