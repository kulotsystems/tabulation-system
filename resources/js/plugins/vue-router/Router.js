import { createRouter, createWebHistory} from 'vue-router';

const routes = [
    {
        path: '/',
        name: 'home',
        component: () => import('../../views/Home.vue')
    },
    {
        path: '/about',
        name: 'about',
        component: () => import('../../views/About.vue')
    },
    {
        path: '/admin',
        name: 'admin-sign-in',
        component: () => import('../../views/Admin/AdminSignIn.vue')
    }
];

const router = createRouter({
    history: createWebHistory('app'),
    routes : routes
});

export default router;
