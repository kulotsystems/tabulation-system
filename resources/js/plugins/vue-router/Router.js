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
        path: '/admin/events/add',
        name: 'admin-events-add',
        component: () => import('../../views/Admin/Event/EventAdd.vue'),
        meta: {
            rules: rules.user,
            title: 'Add Event'
        }
    },
    {
        path: '/admin/:event/judges/add',
        name: 'admin-judges-add',
        component: () => import('../../views/Admin/Judge/JudgeAdd.vue'),
        meta: {
            rules: rules.user,
            title: 'Add Judge'
        }
    },
    {
        path: '/admin/:event/candidates/add',
        name: 'admin-candidates-add',
        component: () => import('../../views/Admin/Candidate/CandidateAdd.vue'),
        meta: {
            rules: rules.user,
            title: 'Add Candidate'
        }
    },
    {
        path: '/admin/:event/portions/add',
        name: 'admin-portions-add',
        component: () => import('../../views/Admin/Portion/PortionAdd.vue'),
        meta: {
            rules: rules.user,
            title: 'Add Portion'
        }
    },

];

const router = createRouter({
    history: createWebHistory('app'),
    routes : routes
});

export default router;
