import MainPage from '@/pages/MainPage';
import AuthPage from '@/pages/AuthPage';

import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: '/',
        component: MainPage
    },
    {
        path: '/auth',
        component: AuthPage
    }
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
});

export default router;