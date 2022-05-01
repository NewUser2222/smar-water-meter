import { createRouter, createWebHistory } from 'vue-router'

import LoginPage from '../components/login.vue'
import HomePage from '../components/home.vue'
import UserPage from '../components/user.vue'
import AdminPage from '../components/admin.vue'
import Tracuu   from '../components/tracuu.vue'

const routes = [
    {path: '/', component: HomePage},
    {path: '/login', component: LoginPage},
    {path: '/user', component: UserPage},
    {path: '/admin', component: AdminPage},
    {path: '/tracuu', component: Tracuu},
] 

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router