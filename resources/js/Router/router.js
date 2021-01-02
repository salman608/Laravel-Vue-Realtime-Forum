import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Login from "../components/Login/Login.vue";
import Signup from "../components/Login/Signup.vue";
import Forum from "../components/forum/forum.vue";
import Logout from "../components/Login/Logout.vue";
import Read from "../components/forum/read.vue";
import Create from "../components/forum/create.vue";

const routes = [
    { path: "/login", component: Login },
    { path: "/logout", component: Logout },
    { path: "/signup", component: Signup },
    { path: "/forum", component: Forum, name: "forum" },
    { path: "/ask", component: Create },
    { path: "/question/:slug", component: Read, name: "read" },
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: "history"
});

export default router;
