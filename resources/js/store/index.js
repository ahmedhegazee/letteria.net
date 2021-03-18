import Vuex from "vuex";
import Vue from "vue";
Vue.use(Vuex);
import { categories } from "./categories";
export const store = new Vuex.Store({
    modules: {
        categories
    }
});
