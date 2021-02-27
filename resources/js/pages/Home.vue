<template>
  <div class="home_slider">
    <VueSlickCarousel
      :arrows="false"
      :dots="true"
      :autoplay="true"
      :autoplaySpeed="8000"
      :slidesToShow="1"
    >
      <div
        class="row slider-image"
        :style="{ backgroundImage: 'url(\'/images/slider1.png\')' }"
      ></div>
      <div
        class="row slider-image"
        :style="{ backgroundImage: 'url(\'/images/slider2.png\')' }"
      ></div>
      <div
        class="row slider-image"
        :style="{ backgroundImage: 'url(\'/images/slider3.png\')' }"
      ></div>
    </VueSlickCarousel>
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
  data() {
    return {};
  },
};
</script>

<style  scoped>
.slider-image {
  min-height: 100vh;
  width: 100%;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  margin: 0 !important;
}
</style>
