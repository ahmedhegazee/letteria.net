<template>
  <div class="home_slider">
    <div
      id="carouselExampleIndicators"
      class="carousel slide"
      data-ride="carousel"
    >
      <ol class="carousel-indicators">
        <li
          data-target="#carouselExampleIndicators"
          :data-slide-to="index"
          v-for="(image, index) in images"
          :key="index"
          :class="{ active: index == 0 }"
        ></li>
        <!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
      </ol>
      <div class="carousel-inner">
        <div
          class="carousel-item"
          v-for="(image, index) in images"
          :key="index"
          :class="{ active: index == 0 }"
        >
          <div class="carousel-content">
            <p class="sub_title">{{ image.sub_title[currentLanguage] }}</p>
            <h1 class="title">{{ image.title[currentLanguage] }}</h1>
          </div>
          <img :src="image.image_src" class="d-block w-100" alt="..." />
        </div>
        <!-- <div class="carousel-item">
          <div class="carousel-content">
            <p class="sub_title">Hand-stamped within</p>
            <h1 class="title">24 Hours</h1>
          </div>
          <img src="/images/slider2.png" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <div class="carousel-content">
            <p class="sub_title">Hand-stamped within</p>
            <h1 class="title">24 Hours</h1>
          </div>
          <img src="/images/slider3.png" class="d-block w-100" alt="..." />
        </div> -->
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
// optional style for arrows & dots
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";

export default {
  components: {
    VueSlickCarousel,
  },
  mounted() {
    axios.get("/api/v1/slider").then((response) => {
      this.images = response.data.images;
    });
  },
  computed: {
    currentLanguage() {
      return this.$i18n.locale;
    },
  },
  data() {
    return {
      images: [],
    };
  },
};
</script>

<style  scoped>
.slider-image {
  min-height: 88vh;
  width: 100%;
  background-repeat: no-repeat !important;
  background-size: cover !important;
  background-position: center !important;
  background-attachment: fixed !important;
  margin: 0 !important;
}
.content {
  justify-content: center;
  align-items: center;
  text-align: center;
  width: 100%;
  height: 88vh;
}
.carousel-content .title,
.carousel-content .sub_title {
  display: block;
  color: #fff;
  font-size: 16px;
  width: 100%;
}
.carousel-content .title {
  font-size: 4.5em;
}
.carousel-content .sub_title {
  font-size: 1.2em;
}
.carousel-content {
  position: absolute;
  top: 33vh;
  text-align: center;
  display: block;
  width: 100%;
}
</style>
