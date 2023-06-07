import Login from "../../components/Pages/Auth/Login.vue";
import Registr from "../../components/Pages/Auth/Registr.vue";

export default [
    {
        path: '/login',
        component: Login,
        name: 'login',
    },
    {
        path: '/register',
        component: Registr,
        name: 'registry',
    },
    {
        path: '/logout',
        name: 'logout',
    },
]
