import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from "../components/Auth/Login";
import Signup from "../components/Auth/Signup";
import Forum from "../components/forum/Forum";
import Logout from "../components/Auth/Logout";

Vue.use(VueRouter)

const routes = [
    {path: '/login', component: Login},
    {path: '/logout', component: Logout},
    {path: '/signup', component: Signup},
    {path: '/forum', component: Forum, name: 'forum'},
]

const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang: false,
    mode: 'history'
})

export default router

