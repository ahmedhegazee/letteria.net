<template >
  <div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 mobile_images">
          <VueSlickCarousel
            :arrows="false"
            :dots="true"
            :autoplay="false"
            :slidesToShow="1"
            :adaptiveHeight="true"
          >
            <div><img src="/images/product_images/product1_img1.jpg" /></div>
            <div><img src="/images/product_images/product1_img2.jpg" /></div>
            <div><img src="/images/product_images/product1_img3.jpg" /></div>
            <div><img src="/images/product_images/product1_img4.jpg" /></div>
            <div><img src="/images/product_images/product1_img5.jpg" /></div>
            <div><img src="/images/product_images/product1_img6.jpg" /></div>
            <div><img src="/images/product_images/product1_img7.jpg" /></div>
          </VueSlickCarousel>
        </div>
        <div class="col-md-7 images">
          <div class="product_image">
            <img src="/images/product_images/product1_img1.jpg" />
          </div>
          <div class="product_image">
            <img src="/images/product_images/product1_img2.jpg" />
          </div>
          <div class="product_image">
            <img src="/images/product_images/product1_img3.jpg" />
          </div>
          <div class="product_image">
            <img src="/images/product_images/product1_img4.jpg" />
          </div>
          <div class="product_image">
            <img src="/images/product_images/product1_img5.jpg" />
          </div>
          <div class="product_image">
            <img src="/images/product_images/product1_img6.jpg" />
          </div>
          <div class="product_image">
            <img src="/images/product_images/product1_img7.jpg" />
          </div>
        </div>
        <div class="col-md-5 col-sm-12">
          <div class="product_info">
            <h1 class="product_title">2 cm Bar Necklace (max. 5 characters)</h1>
            <p class="product_price">£24</p>
            <hr class="hr--small" />
          </div>
          <div class="product_form">
            <form>
              <div class="form-group">
                <label for="barColor">BAR COLOUR</label>
                <select class="form-control" id="barColor">
                  <option v-for="(color, index) in barColors" :key="index">
                    {{ color }}
                  </option>
                </select>
              </div>
              <div class="form-group">
                <label for="barHanging">BAR HANGING</label>
                <select class="form-control" id="barHanging">
                  <option v-for="(color, index) in barHangings" :key="index">
                    {{ color }}
                  </option>
                </select>
              </div>
              <div class="form-group">
                <label for="frontText">FRONT TEXT</label>
                <input type="text" class="form-control" id="frontText" />
              </div>
              <div class="form-group">
                <label for="backText">BACK TEXT(+£5.00)</label>
                <input type="text" class="form-control" id="backText" />
              </div>
              <div class="form-group">
                <label for="leftText">LEFT TEXT(+£5.00)</label>
                <input type="text" class="form-control" id="leftText" />
              </div>
              <div class="form-group">
                <label for="rightText">RIGHT TEXT(+£5.00)</label>
                <input type="text" class="form-control" id="rightText" />
              </div>
              <div class="form-group">
                <label for="topText">TOP TEXT(+£5.00)</label>
                <input type="text" class="form-control" id="topText" />
              </div>
              <div class="form-group">
                <label for="textAlighnments">TEXT ALIGNMENT</label>
                <select class="form-control" id="textAlighnments">
                  <option
                    v-for="(color, index) in textAlighnments"
                    :key="index"
                  >
                    {{ color }}
                  </option>
                </select>
              </div>
              <div class="form-group">
                <label for="chainLengths">CHAIN LENGTHS</label>
                <select class="form-control" id="chainLengths">
                  <option v-for="(color, index) in chainLengths" :key="index">
                    {{ color }}
                  </option>
                </select>
              </div>
              <div class="form-group">
                <label for="instructions">ADDITIONAL INSTRUCTIONS</label>
                <textarea
                  class="form-control"
                  id="instructions"
                  rows="3"
                ></textarea>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="specialOrder"
                />
                <label class="form-check-label" for="specialOrder">
                  Made just for you
                </label>
              </div>

              <p class="product_notes">
                I confirm the personalised text and details put here are correct
                as these cannot be changed once submitted.
              </p>
              <p class="order_total">Customizations Total: £0.00</p>
              <button type="button" class="btn btn-dark">ADD TO CART</button>
            </form>
            <ul class="description">
              <li>
                Our 2 cm letter bar is brass-plated and measures 4.7mm x 4.7mm x
                20mm.
              </li>
              <li>
                A maximum of 5 characters allowed including spaces on each side.
              </li>
              <li>
                A horizontal bar allows engraving on 3 sides: Front, Back, Top
                (Bottom text is not allowed). A vertical bar allows engraving on
                4 sides: Front, Back, Left, Right.
              </li>
              <li>
                Characters allowed all uppercase letters A-Z, numbers 0-9,
                space, symbols & @ ? # ! ( ) : " , . and ♡
              </li>
              <li>
                Each 2mm letter is hand stamped individually and runs
                horizontally across the bar in the font style pictured.
              </li>
              <li>
                Custom made to order in our London studio. No two pieces are the
                same, irregularities add character and should be appreciated
                taking on its own beautiful identity.
              </li>
            </ul>
          </div>
        </div>
      </div>
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
  data() {
    return {
      barColors: ["Gold", "Silver", "Rose Gold"],
      barHangings: ["Horizontal", "Vertical"],
      textAlighnments: ["Centre", "Right"],
      chainLengths: ['16"-18" (ADJUSTABLE)', '24"-26" (ADJUSTABLE)'],
      isSpecial: false,
    };
  },
};
</script>
<style scoped>
.container {
  padding-top: 80px;
}
.product_image {
  margin-bottom: 15px;
}
.product_info {
  padding-top: 45px;
}
.product_form,
.product_info {
  text-align: center;
}
.product_title {
  margin-bottom: 15px;
  word-wrap: break-word;
  letter-spacing: 1px;
}
.product_notes {
  font-size: 1em;
  color: #000;
}
.product_price {
  color: #000;
  font-size: 1.5em;
}
.theme--light.v-application {
  background: transparent !important;
}
.btn-dark {
  color: #fff !important;
}
.form-control {
  font-weight: 400;
  min-width: 175px;
  max-width: 70%;
  margin: 3px auto;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  display: block;
  line-height: 1em;
  padding: 9px 11px;
  font-size: 0.8125em;
  font-style: normal;
  /* background-color: #fafafa; */
  border: 1px solid #1c1d1d;
  border-radius: 0px;
}
.description {
  margin-top: 40px;
}
.description li {
  margin-bottom: 25px;
  text-align: left;
}
.mobile_images {
  display: none;
  padding: 0;
}
.mobile_images img {
  width: 100%;
}

@media (max-width: 768px) {
  .images {
    display: none;
  }
  .mobile_images {
    display: block;
  }
}
</style>
