require("./bootstrap");

require("alpinejs");
import Vue from "vue";
import App from "./pages/App.vue";
import VueRouter from "vue-router";
import VueAxios from "vue-axios";
import axios from "axios";
import { routes } from "./routes/index";
import { messages } from "./messages";
import VueI18n from "vue-i18n";
Vue.component("test", "./components/test.vue");
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VueI18n);
import "@fortawesome/fontawesome-free/css/all.css";
import "@fortawesome/fontawesome-free/js/all.js";
const i18n = new VueI18n({
    locale: "en", // set locale
    messages // set locale messages
});

const router = new VueRouter({
    mode: "history",
    routes: routes
});

const app = new Vue({
    el: "#app",
    router,
    render: h => h(App),
    i18n
});
