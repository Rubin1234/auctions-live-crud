import { createRouter, createWebHistory } from "vue-router";

import Home from '../components/Homepage.vue';
import CreateUser from '../components/createUser.vue';
import UpdateUser from '../components/updateUser.vue';
import PageNotFound from '../components/NotFoundPage.vue';

const routes = [
    {
        path: '/',
        component: Home,
    },
    {
        path: '/create-user',
        component: CreateUser
    },
    {
        path: '/update-user/:id',
        component: UpdateUser
    },
    {
        path: '/:pathMatch(.*)*',
        component: PageNotFound
    }

]
const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
 