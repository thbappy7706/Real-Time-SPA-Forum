import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from "../components/Auth/Login";
import Signup from "../components/Auth/Signup";
import Forum from "../components/forum/Forum";
import Logout from "../components/Auth/Logout";
import Read from "../components/forum/Read";
import Create from "../components/forum/Create";
import CreateCategory from "../components/category/CreateCategory";
import Parallex from "../components/Parallex";

Vue.use(VueRouter)

const routes = [
    {path: '/', component: Parallex},
    {path: '/login', component: Login},
    {path: '/logout', component: Logout},
    {path: '/signup', component: Signup},
    {path: '/forum', component: Forum, name: 'forum'},
    {path: '/ask', component: Create},
    {path: '/question/:slug', component: Read, name: 'read'},
    {path: '/category', component:CreateCategory},

]

const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang: false,
    mode: 'history'
})

export default router

