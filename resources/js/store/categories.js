export const categories = {
    namespaced: true,
    state: () => ({
        categories: [],
        currentCategory: {}
    }),
    mutations: {
        SET_CATEGORIES(state, data) {
            state.categories = data;
        },
        SET_CURRENT_CATEGORY(state, slug) {
            let category = state.categories.filter(
                category => (category.slug = slug)
            );
            if (category.length == 0) this.$router.push("/404");
            else state.currentCategory = category[0];
        }
    },
    actions: {
        getCategories({ commit }) {
            axios.get("/api/v1/categories").then(response => {
                commit("SET_CATEGORIES", response.data.categories);
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
        }
    }
};
