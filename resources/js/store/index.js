import Vuex from "vuex";
import Vue from "vue";
Vue.use(Vuex);
import { categories } from "./categories";
import { cart } from "./cart";
export const store = new Vuex.Store({
    modules: {
        categories,
        cart
    }
});
