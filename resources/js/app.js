require("./bootstrap");

window.Vue = require("vue");
import Vue from "vue";

// ========Import Vuetify=======
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
Vue.use(Vuetify);

// =========Mark down Editpr========
import VueSimplemde from 'vue-simplemde'
Vue.use(VueSimplemde)
import md from 'marked'
window.md=md

// ======Import Router ===========
import router from "./Router/router.js";

//=========Import Healper =========
import User from "./Helpers/User.js";
window.User = User;

window.EventBus=new Vue();

Vue.component("app-home", require("./components/AppHome.vue").default);
const app = new Vue({
    el: "#app",
    router
    // render: (h) => h(app),
}).$mount("#app");
