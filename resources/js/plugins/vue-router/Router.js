import { createRouter, createWebHistory} from 'vue-router';
import rules from './rules/rules.js';

const routes = [
    {
        path: '/',
        name: 'home',
        component: () => import('../../views/Home.vue'),
        meta: {
            rules: rules.anyone,
            title: 'Home'
        }
    },
    {
        path: '/about',
        name: 'about',
        component: () => import('../../views/About.vue'),
        meta: {
            rules: rules.anyone,
            title: 'About'
        }
    },
    {
        path: '/admin',
        name: 'admin-sign-in',
        component: () => import('../../views/Admin/AdminSignIn.vue'),
        meta: {
            rules: rules.anyone,
            title: 'Sign In'
        }
    },
    {
        path: '/admin/judges',
        name: 'admin-judges',
        component: () => import('../../views/Admin/Judges.vue'),
        meta: {
            rules: rules.user,
            title: 'Judges'
        }
    },
    {
        path: '/admin/candidates',
        name: 'admin-candidates',
        component: () => import('../../views/Admin/Candidates.vue'),
        meta: {
            rules: rules.user,
            title: 'Candidates'
        }
    }
];

const router = createRouter({
    history: createWebHistory('app'),
    routes : routes
});

export default router;
