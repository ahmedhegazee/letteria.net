<template >
  <div class="container">
    <div class="main-content">
      <div class="header">
        <h1>Your Cart</h1>
        <hr class="hr--small" />
      </div>
      <div class="cart row">
        <div class="col-12 cart_header">
          <div class="row">
            <div class="col-7"></div>
            <div class="col-5">
              <div class="row">
                <div class="col-6 text-center">Quantity</div>
                <div class="col-6 text-center">Total</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 cart_products">
          <template v-if="cart.length">
            <div
              class="row mb-2"
              v-for="(order, index) in cart"
              :key="index"
              style="border-bottom: 1px solid"
            >
              <div class="col-md-7 col-sm-12">
                <div class="row">
                  <div class="col-md-4 col-sm-4 row pl-md-5">
                    <img :src="'/'+order.image" class="product_image" />
                  </div>
                  <div class="col-md-8 col-sm-8 pl-md-5">
                    <h5 class="product_title">
                      {{ order.name[currentLanguage] }}
                    </h5>
                    <div
                      class="order_description"
                      v-for="(detail, key) in order.details"
                      :key="key"
                    >
                      {{
                        formatLabel(detail.name[currentLanguage], detail.price)
                      }}
                      :
                      <template v-if="detail.isText">
                        {{ detail.value }}
                      </template>
                      <template v-else>
                        {{
                          formatLabel(
                            detail.valueName[currentLanguage],
                            detail.valuePrice
                          )
                        }}
                      </template>
                    </div>
                    <div class="order_description">Made just for you: ✓</div>
                    <button
                      type="button"
                      class="order_description"
                      @click="removeOrder(order.id)"
                    >
                      Remove
                    </button>
                  </div>
                </div>
              </div>
              <div class="col-md-5 col-sm-12">
                <div class="row">
                  <div class="col-6 text-center product_quantity_container">
                    <input
                      type="number"
                      min="1"
                      :value="order.quantity"
                      name="product_quantity"
                      style="width: 50%"
                      @change="updateQuantity($event, order.id)"
                    />
                  </div>
                  <div class="col-6 text-center total_container">
                    {{ order.price }}SR
                  </div>
                </div>
              </div>
            </div>
          </template>
          <template v-else> Sorry your cart is empty </template>
        </div>
        <div class="col-md-12 cart_footer">
          <div class="row">
            <div class="col-md-7 col-sm-12">
              <div class="form-group">
                <label for="instructions"
                  >Special instructions for seller</label
                >
                <textarea
                  class="form-control"
                  id="instructions"
                  rows="3"
                ></textarea>
              </div>
            </div>
            <div class="col-md-5 col-sm-12">
              <div class="row">
                <div class="col-6 mb-4 text-center">Subtotal</div>
                <div class="col-6 mb-4 text-center">{{ total }}SR</div>
                <div class="col-12">
                  <p class="mb-4" style="color: #000; font-size: 14px">
                    <em>Shipping and taxes calculated at checkout</em>
                  </p>
                  <!-- <button type="button" class="btn btn-dark">CHECK OUT</button> -->
                  <a href="/checkout" class="btn btn-dark" v-if="cart.length">CHECK OUT</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mapGetters } from "vuex";
import helper from "../mixins/helper";
export default {
  mixins: [helper],
  computed: {
    ...mapGetters("cart", ["cart", "total"]),
  },
  methods: {
    updateQuantity(ev, orderID) {
      this.$store.commit("cart/UPDATE_PRODUCT_QUANTITY", {
        orderID,
        quantity: parseInt(ev.target.value),
      });
    },
    removeOrder(orderID) {
      this.$store.commit("cart/REMOVE_ORDER", orderID);
    },
  },
};
</script>
<style scoped>
.header {
  margin-bottom: 50px;
}
.btn-dark {
  color: #fff !important;
}
.product_image {
  width: 100%;
  margin: auto 0;
}
.cart_header {
  border-bottom: 1px solid #1c1d1d;
  padding-bottom: 15px;
  margin-bottom: 30px;
}
.cart_footer {
  border-top: 1px solid #1c1d1d;
  padding-top: 15px;
}
.cart {
  width: 83.333%;
  margin: 0 auto;
  text-align: left;
}
.cart_products {
  margin-bottom: 30px;
}
.header {
  text-align: center;
}
@media (max-width: 768px) {
  .cart_header {
    display: none;
  }
  .col-sm-4 {
    width: 25% !important;
    padding-left: 0;
    /* padding-right: 0; */
  }
  .col-sm-8 {
    width: 75% !important;
  }
  .product_quantity_container {
    text-align: left !important;
    padding-left: 0;
    margin-top: 10px;
  }
  .total_container {
    text-align: right !important;
    padding-right: 0;
    margin-top: 10px;
  }
}
button {
  background: transparent;
  border: none;
  padding: 0;
}
</style>
