export const cart = {
    namespaced: true,
    state: () => ({
        cart: []
    }),
    mutations: {
        SET_CART(state, cart) {
            state.cart = cart;
        },
        UPDATE_PRODUCT_QUANTITY(state, { orderID, quantity }) {
            let order = state.cart.filter(order => (order.id = orderID))[0];
            order.quantity = quantity;
            order.price = order.base_price * quantity;
            localStorage.setItem("cart", JSON.stringify(state.cart));
        },
        ADD_ORDER(state, order) {
            state.cart.push(order);
            localStorage.setItem("cart", JSON.stringify(state.cart));
        },
        CLEAR_CART(state) {
            state.cart = [];
            localStorage.removeItem("cart");
        },
        REMOVE_ORDER(state, orderID) {
            const index = state.cart.findIndex(order => order.id == orderID);

            if (index > -1) {
                state.cart.splice(index, 1);
            }
            localStorage.setItem("cart", JSON.stringify(state.cart));
        }
    },
    actions: {},
    getters: {
        cart: state => state.cart,
        total: state => {
            let total = 0;
            for (let index = 0; index < state.cart.length; index++) {
                total += state.cart[index].price;
            }
            return total;
        }
    }
};
