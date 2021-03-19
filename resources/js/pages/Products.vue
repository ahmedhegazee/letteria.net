<template >
  <div class="container">
    <template v-if="currentCategory.name">
      <div class="header">
        <h1>{{ currentCategory.name[currentLanguage] }}</h1>
        <hr class="hr--small" />
        <p>
          {{ currentCategory.content[currentLanguage] }}
        </p>
      </div>
      <div class="products">
        <div class="row" v-if="firstThreeProducts.length">
          <div class="col-md-7 col-sm-12">
            <router-link :to="`/products/${firstThreeProducts[0].slug}`">
              <div class="product first-product">
                <img :src="'/' + firstThreeProducts[0].image_src" />
              </div>
              <div class="product-title">
                <span> {{ firstThreeProducts[0].title[currentLanguage] }} </span
                ><span>—{{ firstThreeProducts[0].price }}SR</span>
              </div>
            </router-link>
          </div>
          <div class="col-md-5 col-sm-12">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <router-link :to="`/products/${firstThreeProducts[1].slug}`">
                  <div class="product" style="height: 245px">
                    <img :src="'/' + firstThreeProducts[1].image_src" />
                  </div>
                  <div class="product-title">
                    <span
                      >{{ firstThreeProducts[1].title[currentLanguage] }} </span
                    ><span>—{{ firstThreeProducts[1].price }}SR</span>
                  </div>
                </router-link>
              </div>
              <div class="col-md-12 col-sm-12">
                <router-link :to="`/products/${firstThreeProducts[2].slug}`">
                  <div class="product" style="height: 245px">
                    <img :src="'/' + firstThreeProducts[2].image_src" />
                  </div>
                  <div class="product-title">
                    <span>{{
                      firstThreeProducts[1].title[currentLanguage]
                    }}</span
                    ><span>—{{ firstThreeProducts[2].price }}SR</span>
                  </div>
                </router-link>
              </div>
            </div>
          </div>
        </div>
        <div class="row" v-if="restProducts.length">
          <div
            class="col-md-6 col-sm-12"
            v-for="(product, index) in restProducts"
            :key="index"
          >
            <router-link :to="`/products/${product.slug}`">
              <div class="product" style="height: 310px">
                <img :src="'/' + product.image_src" />
              </div>
              <div class="product-title">
                <span> {{ product.title[currentLanguage] }} </span
                ><span>— {{ product.price }} </span>
              </div>
            </router-link>
          </div>
        </div>
      </div>
    </template>
  </div>
</template>
<script>
import { mapGetters } from "vuex";
export default {
  mounted() {
    let slug = this.$route.params.slug;
    this.$store.dispatch("categories/getCategoryProducts", slug);
  },
  computed: {
    ...mapGetters("categories", [
      "currentCategory",
      "firstThreeProducts",
      "restProducts",
    ]),
    currentLanguage() {
      return this.$i18n.locale;
    },
  },
};
</script>
<style scoped>
.header {
  text-align: center;
  padding-top: 80px;
  margin-bottom: 50px;
}
.header h1 {
  margin-bottom: 10px;
  font-weight: lighter;
}
.header p {
  color: #000;
}
.product {
  background-color: #f7f7f7;
  position: relative;
}
.product img {
  display: block;
  margin: 0 auto;
  max-height: 100%;
  max-width: 100%;
  padding: 20px;
}
.product-title {
  text-align: center;
  padding: 13px 0;
}
.first-product {
  height: 535px;
}
@media (max-width: 768px) {
  .first-product {
    height: auto;
  }
}
</style>
