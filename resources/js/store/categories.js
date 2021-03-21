import { EventBus } from "../EventBus";
export const categories = {
    namespaced: true,
    state: () => ({
        categories: [],
        currentCategory: {},
        currentProduct: {}
    }),
    mutations: {
        SET_CATEGORIES(state, data) {
            state.categories = data;
        },
        SET_CURRENT_CATEGORY(state, category) {
            state.currentCategory = category;
        },
        SET_CURRENT_PRODUCT(state, product) {
            state.currentProduct = product;
        }
    },
    actions: {
        getCategories({ commit }) {
            axios.get("/api/v1/categories").then(response => {
                commit("SET_CATEGORIES", response.data.categories);
                setTimeout(() => {
                    EventBus.$emit("changeLoadingStatus", false);
                }, 1000);
            });
        },
        getCategoryProducts({ commit }, slug) {
            axios.get(`/api/v1/category/${slug}/products`).then(response => {
                commit("SET_CURRENT_CATEGORY", response.data.category);
                setTimeout(() => {
                    EventBus.$emit("changeLoadingStatus", false);
                }, 1000);
            });
        },
        getProductDetails({ commit }, slug) {
            axios.get(`/api/v1/product/${slug}/details`).then(response => {
                commit("SET_CURRENT_PRODUCT", response.data.product);
                setTimeout(() => {
                    EventBus.$emit("changeLoadingStatus", false);
                }, 1000);
            });
        }
    },
    getters: {
        categories: state => state.categories,
        currentCategory: state => state.currentCategory,
        firstThreeProducts: state => {
            let products = state.currentCategory.products;
            if (products.length >= 3) return products.slice(0, 3);
            return [];
        },
        restProducts: state => {
            let products = state.currentCategory.products;
            if (products.length >= 3) return products.slice(3);
            return products;
        },
        currentProduct: state => state.currentProduct
    }
};
