import { createRouter, createWebHistory } from 'vue-router'
import HomePage from './HomePage/home-page-route'

const Route = [];
const routes = Route.concat(
    HomePage,
)

export default createRouter({
    history: createWebHistory(),
    routes
})
