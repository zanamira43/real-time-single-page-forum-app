import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from '../components/login/Login.vue'
import Signup from '../components/login/Signup.vue'
import Logout from '../components/login/Logout.vue'
import Forum from '../components/forum/Forum.vue'
import Read from '../components/forum/Read.vue'
import CreateQuestion from '../components/forum/CreateQuestion.vue'
import CreateCategory from '../components/category/CreateCategory.vue'

const routes = [
    { path: '/login', component: Login, name: 'login' },
    { path: '/signup', component: Signup },
    { path: '/forum', component: Forum, name: 'forum' },
    { path: '/category', component: CreateCategory },
    { path: '/logout', component: Logout, name: 'logout' },
    { path: '/question/:slug', component: Read, name: 'read' },
    { path: '/ask', component: CreateQuestion, name: 'ask' }
]

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history',
    hashbang: false
})


export default router