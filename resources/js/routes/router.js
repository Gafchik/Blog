import { createRouter, createWebHistory } from 'vue-router'
import HomePage from './HomePage/home-page-route'
import Auth from './Auth/auth-route'
import Profile from './Profile/profile-route'

const Route = [];
const routes = Route.concat(
    HomePage,
    Auth,
    Profile,
)

const router = createRouter({
    history: createWebHistory(),
    routes
})
router.beforeEach((to,from,next) =>{
    const token = localStorage.getItem('x_xsrf_token');
    if (to.name === 'login' || to.name === 'registry'){
        return token
            ? next({name: 'home'})
            : next();
    }
    if(to.name === 'logout'){
        return token
            ? next()
            : next({name: 'home'})
    }
    if(//add yours admin panel routes
        to.name === 'profile'
        // || to.name === 'userManagement'
        ){
        return token
            ? next()
            : next({name: 'login'})
    }
    next();
})
export default router;
