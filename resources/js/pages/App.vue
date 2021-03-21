<template >
  <!--  -->
  <div class="wrapper">
    <Loader v-if="isLoading"></Loader>
    <!-- Sidebar  -->
    <nav id="sidebar" class="active">
      <div class="sidbar-header">
        <button
          type="button"
          id="sidebarCollapse"
          @click="toggleSidebar"
          class="btn btn-dark"
        >
          <i class="fas fa-times"></i>
        </button>
      </div>
      <template v-if="categories.length">
        <ul class="list-unstyled components">
          <li
            class="active"
            v-for="(category, index) in categories"
            :key="index"
          >
            <router-link :to="`/category/${category.slug}`" class="d-inline">
              {{ category.name[currentLanguage] }}
            </router-link>
            <a
              :href="`#${category.slug}`"
              data-toggle="collapse"
              aria-expanded="false"
              class="dropdown-toggle d-inline-block"
              style="border: none"
              ><i class="fas fa-plus"></i
            ></a>

            <ul class="collapse list-unstyled" :id="`${category.slug}`">
              <li v-for="(product, key) in category.products" :key="key">
                <router-link :to="`/products/${product.slug}`">
                  {{ product.title[currentLanguage] }}
                </router-link>
              </li>
            </ul>
          </li>
        </ul>
      </template>

      <ul class="list-unstyled CTAs" style="font-weight: 300">
        <li>
          <router-link to="#" c>Our Story</router-link>
        </li>
        <li>
          <router-link to="#">FAQ</router-link>
        </li>
        <li>
          <router-link to="#">Delivery & Returns</router-link>
        </li>
        <li>
          <router-link to="#">Contact Us</router-link>
        </li>
      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
      <nav
        class="navbar navbar-expand-lg"
        :class="{
          'navbar-dark bg-dark': isHomePage,
          'navbar-light bg-light': !isHomePage,
        }"
        v-if="!isCheckout"
      >
        <div class="container-fluid">
          <router-link class="navbar-brand" to="/">Letteria</router-link>
          <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Page</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Page</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Page</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Page</a>
              </li>
            </ul>
          </div> -->
          <div class="d-inline">
            <button
              type="button"
              @click="toggleLanguage()"
              class="btn"
              :class="{
                'btn-dark': isHomePage,
                'btn-light': !isHomePage,
              }"
            >
              {{ currentLanguage }}
            </button>
            <button
              type="button"
              id="sidebarCollapse"
              @click="toggleSidebar"
              class="btn"
              :class="{
                'btn-dark': isHomePage,
                'btn-light': !isHomePage,
              }"
            >
              <i class="fas fa-align-justify"></i>
            </button>
            <router-link
              class="btn"
              :class="{
                'btn-dark': isHomePage,
                'btn-light': !isHomePage,
              }"
              to="/cart"
            >
              <i class="fas fa-shopping-cart"></i>
            </router-link>
          </div>
          <!-- <button
            class="btn btn-dark d-inline-block d-lg-none ml-auto"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-align-justify"></i>
          </button> -->
        </div>
      </nav>

      <router-view></router-view>
      <template v-if="!isCheckout">
        <hr class="hr--large" />
        <div class="footer row">
          <div class="container">
            <div class="row">
              <div class="col-md-4 col-sm-12">
                <ul class="list-unstyled">
                  <li><a href="#">Our Story</a></li>
                  <li><a href="#">FAQ</a></li>
                  <li><a href="#">Delivery&Returns</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-md-4 col-sm-12">
                <ul class="list-unstyled">
                  <li>
                    <a href="#"
                      ><i class="fab fa-facebook-f"></i>&nbsp;Facebook</a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fab fa-instagram"></i>&nbsp;Instagram</a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fab fa-snapchat-ghost"></i>&nbsp;Snapchat</a
                    >
                  </li>
                </ul>
              </div>
              <div class="col-md-4 col-sm-12">
                <p>&copy;2021, Letteria</p>
                <ul class="list-unstyled payments">
                  <li>
                    <a href=""><i class="fab fa-cc-visa"></i></a>
                  </li>
                  <li>
                    <a href=""><i class="fab fa-cc-mastercard"></i></a>
                  </li>
                  <li>
                    <a href=""><i class="fab fa-cc-amex"></i></a>
                  </li>
                  <li>
                    <a href=""><i class="fab fa-apple-pay"></i></a>
                  </li>
                  <li>
                    <a href=""><i class="fab fa-paypal"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </template>
    </div>
  </div>
</template>
<script>
import { EventBus } from "../EventBus";
import { mapGetters } from "vuex";
import Loader from "../components/loader.vue";
export default {
  components: {
    Loader,
  },
  data() {
    return {
      isLoading: true,
    };
  },
  created() {
    let cart = localStorage.getItem("cart");
    if (cart) this.$store.commit("cart/SET_CART", JSON.parse(cart));
    let information = localStorage.getItem("information");
    if (information)
      this.$store.commit("cart/SET_INFORMATION", JSON.parse(information));
    this.$store.dispatch("categories/getCategories");
    EventBus.$on("changeLoadingStatus", (status) => {
      this.isLoading = status;
    });
  },
  methods: {
    toggleSidebar() {
      let sidebar = document.getElementById("sidebar");
      sidebar.classList.toggle("active");
      let body = document.getElementById("body");
      body.classList.toggle("overflow");
    },
    toggleLanguage() {
      this.$i18n.locale = this.currentLanguage == "en" ? "ar" : "en";
    },
  },
  computed: {
    currentLanguage() {
      return this.$i18n.locale;
    },
    isHomePage() {
      return this.$route.name == "home";
    },
    isCheckout() {
      return (
        this.$route.name == "checkout" ||
        this.$route.name == "shipping" ||
        this.$route.name == "payment" ||
        this.$route.name == "order"
      );
    },
    ...mapGetters("categories", ["categories"]),
  },
};
</script>
<style >
.container-fluid {
  max-width: 1050px;
}
.bg-dark,
.btn-dark {
  background-color: #000000 !important;
}
.btn {
  border: none !important;
}
body {
  overflow-x: hidden;
}
#sidebar {
  z-index: 101;
}
.overflow {
  overflow: hidden;
}
.sidbar-header {
  height: 80px;
  padding-left: 25px;
  display: flex;
  align-items: center;
}
.sidbar-header .btn {
  background-color: transparent !important;
}
.payments li {
  display: inline-block;
  font-size: 35px;
}
@media (max-width: 768px) {
  .footer {
    text-align: center;
    padding-top: 0px;
  }
  .footer .col-sm-12 {
    margin-bottom: 20px;
  }
  .payments li {
    display: block;
    text-align: center;
  }
}
</style>
