import Home from './component/Home.vue';
import About from './component/About.vue';
import {createRouter, createWebHashHistory} from "vue-router";

const routes = [
        {
            path: '/',
            component: Home,
        },
        {
            path: '/about',
            component: About,
        }
    ];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;
