import { createRouter, createWebHistory } from 'vue-router'
import HomePage from './HomePage/home-page-route'
import Auth from './Auth/auth-route'

const Route = [];
const routes = Route.concat(
    HomePage,
    Auth,
)

export default createRouter({
    history: createWebHistory(),
    routes
})
