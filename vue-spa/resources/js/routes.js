import Home from './component/Home.vue';
import About from './component/About.vue';
import ApiExample from "./component/ApiExample.vue";
import UserList from "./component/UserList.vue";

import {createRouter, createWebHashHistory} from "vue-router";

const routes = [
        {
            path: '/',
            component: Home,
        },
        {
            path: '/about',
            component: About,
            name: 'about',
        },
        {
            path: '/api-example',
            component: ApiExample,
            name: 'example',
        },
        {
            path: '/user-list',
            component: UserList,
            name: 'users',
        },

    ];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;
