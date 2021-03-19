import Home from "../pages/Home.vue";
import Products from "../pages/Products.vue";
import ProductShow from "../pages/product_show.vue";
import Cart from "../pages/Cart.vue";
import Checkout from "../pages/Checkout.vue";
import Shipping from "../pages/Shipping.vue";
import Payment from "../pages/Payment.vue";
import ReviewOrder from "../pages/ReviewOrder.vue";
export const routes = [
    {
        name: "home",
        path: "/",
        component: Home
    },
    {
        name: "products",
        path: "/category/:slug",
        component: Products
    },
    {
        name: "product_show",
        path: "/products/:slug",
        component: ProductShow
    },
    {
        name: "cart",
        path: "/cart",
        component: Cart
    },
    {
        name: "checkout",
        path: "/checkout",
        component: Checkout
    },
    {
        name: "shipping",
        path: "/shipping",
        component: Shipping
    },
    {
        name: "payment",
        path: "/payment",
        component: Payment
    },
    {
        name: "order",
        path: "/order",
        component: ReviewOrder
    }

    // {
    //     name: "add",
    //     path: "/add",
    //     component: AddPost,
    // },
    // {
    //     name: "edit",
    //     path: "/edit/:id",
    //     component: EditPost,
    // },
];
