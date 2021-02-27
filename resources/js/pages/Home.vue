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
        class="slider-image"
        :style="{ backgroundImage: 'url(\'/images/slider1.png\')' }"
      >
        <div class="row content">
          <div>
            <p class="sub_title">UK & Republic of Ireland</p>
            <h1 class="title">Free Shipping</h1>
          </div>
        </div>
      </div>
      <div
        class="slider-image"
        :style="{ backgroundImage: 'url(\'/images/slider2.png\')' }"
      >
        <div class="row content">
          <div>
            <p class="sub_title">Hand-stamped within</p>
            <h1 class="title">24 Hours</h1>
          </div>
        </div>
      </div>
      <div
        class="slider-image"
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
  min-height: 88vh;
  width: 100%;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  margin: 0 !important;
}
.content {
  justify-content: center;
  align-items: center;
  text-align: center;
  width: 100%;
  height: 88vh;
}
.content .title,
.content .sub_title {
  display: block;
  color: #fff;
  font-size: 16px;
  width: 100%;
}
.content .title {
  font-size: 4.5em;
}
.content .sub_title {
  font-size: 1.2em;
}
</style>
