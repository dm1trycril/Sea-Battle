import MainPage from '@/pages/MainPage';
import LoginPage from '@/pages/LoginPage';
import RoomPage from '@/pages/RoomPage';
import RegistrationPage from '@/pages/RegistrationPage';

import { createRouter, createWebHashHistory} from "vue-router";

const routes = [
    {
        path: '/',
        component: MainPage
    },
    {
        path: '/login',
        component: LoginPage
    },
    {
        path: '/room/:id',
        component: RoomPage
    },
    {
        path: '/register',
        component: RegistrationPage
    }
];

const router = createRouter({
    history: createWebHashHistory(process.env.BASE_URL),
    routes
});

export default router;