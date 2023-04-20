import Home from './component/views/Home.vue';
import About from './component/views/About.vue';
import ApiExample from "./component/views/ApiExample.vue";
import UserList from "./component/views/UserList.vue";
import ImageList from "./component/views/ImageList.vue";

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
        {
            path: '/image-list',
            component: ImageList,
            name: 'images',
        },

    ];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;
