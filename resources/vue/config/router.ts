import {createRouter, createWebHistory, RouteRecordRaw} from "vue-router";
import Login from "@/pages/Login.vue";
import Main from "@/pages/Main.vue";
import {useUserStore} from "@/store/useUserStore";

const routes: RouteRecordRaw[] = [
    {
        name: 'main',
        path: '/',
        component: Main,
    },
    {
        name: 'login',
        path: '/login',
        component: Login,
    }
]

const router = createRouter(
    {
        history: createWebHistory(),
        routes: routes,
    }
);

router.beforeEach(async (to) => {
    const user = useUserStore();
    const isAuth = user.isAuth;
    if (!isAuth && to.name !== 'login') {
        return {
            name: 'login',
        }
    }
})

export default router;
