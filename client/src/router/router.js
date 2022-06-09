import MainPage from '@/pages/MainPage';
import AuthPage from '@/pages/AuthPage';
import RoomPage from '@/pages/RoomPage';
import RegistrationPage from '@/pages/RegistrationPage';

import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: '/',
        component: MainPage
    },
    {
        path: '/auth',
        component: AuthPage
    },
    {
        path: '/room',
        component: RoomPage
    },
    {
        path: '/register',
        component: RegistrationPage
    }
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
});

export default router;