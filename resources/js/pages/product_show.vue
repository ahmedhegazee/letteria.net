<template >
  <div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 mobile_images">
          <div
            id="carouselExampleIndicators"
            class="carousel slide"
            data-ride="carousel"
          >
            <ol class="carousel-indicators">
              <li
                data-target="#carouselExampleIndicators"
                :data-slide-to="index"
                v-for="(image, index) in currentProduct.images"
                :key="index"
                :class="{ active: index == 0 }"
              ></li>
              <!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
            </ol>
            <div class="carousel-inner">
              <div
                class="carousel-item"
                v-for="(image, index) in currentProduct.images"
                :key="index"
                :class="{ active: index == 0 }"
              >
                <img
                  :src="'/' + image.src"
                  class="d-block w-100"
                  alt="..."
                  height="300px"
                />
              </div>
            </div>
            <a
              class="carousel-control-prev"
              href="#carouselExampleIndicators"
              role="button"
              data-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="sr-only">Previous</span>
            </a>
            <a
              class="carousel-control-next"
              href="#carouselExampleIndicators"
              role="button"
              data-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <div class="col-md-7 images">
          <div
            class="product_image"
            v-for="(image, index) in currentProduct.images"
            :key="index"
          >
            <img :src="'/' + image.src" />
          </div>
        </div>
        <div class="col-md-5 col-sm-12">
          <div class="product_info">
            <h1 class="product_title" v-if="currentProduct.title">
              {{ currentProduct.title[currentLanguage] }}
            </h1>
            <p class="product_price">{{ currentProduct.price }}SR</p>
            <hr class="hr--small" />
          </div>
          <div class="product_form">
            <form id="form" onsubmit="e.preventDefault()">
              <div
                class="form-group"
                v-for="(attribute, index) in currentProduct.attributes"
                :key="index"
              >
                <template v-if="attribute.type == 'dropdown'">
                  <label :for="'attr-' + index">
                    {{
                      formatLabel(
                        attribute.name[currentLanguage],
                        attribute.price
                      )
                    }}
                  </label>
                  <select
                    class="form-control"
                    :id="'attr-' + index"
                    v-model="form[attribute.name['en']]"
                    @change="changeAttributeValue(attribute)"
                  >
                    <option
                      v-for="(attributeValue, key) in attribute.values"
                      :key="key"
                      :value="attributeValue.id"
                    >
                      {{
                        formatLabel(
                          attributeValue.value[currentLanguage],
                          attributeValue.price
                        )
                      }}
                    </option>
                  </select>
                </template>
                <template v-if="attribute.type == 'text'">
                  <label :for="'attr-' + index">{{
                    formatLabel(
                      attribute.name[currentLanguage],
                      attribute.price
                    )
                  }}</label>
                  <input
                    type="text"
                    class="form-control"
                    :id="'attr-' + index"
                    :maxlength="attribute.limit_chars"
                    :required="attribute.required ? 'required' : false"
                    v-model="form[attribute.name['en']]"
                    @keyup="changeAttributeValue(attribute)"
                  />
                </template>
                <template v-if="attribute.type == 'radio'">
                  <h3>
                    {{
                      formatLabel(
                        attribute.name[currentLanguage],
                        attribute.price
                      )
                    }}
                  </h3>
                  <div
                    class="form-check"
                    v-for="(attributeValue, key) in attribute.values"
                    :key="key"
                  >
                    <input
                      class="form-check-input"
                      type="radio"
                      :name="attribute.name['en']"
                      id="exampleRadios1"
                      :value="attributeValue.id"
                      v-model="form[attribute.name['en']]"
                    />
                    <label class="form-check-label" for="exampleRadios1">
                      {{ attributeValue.value[currentLanguage] }}
                    </label>
                  </div>
                </template>
              </div>
              <div class="form-group">
                <label for="instructions">ADDITIONAL INSTRUCTIONS</label>
                <textarea
                  v-model="form.notes"
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
                  required
                />
                <label class="form-check-label" for="specialOrder">
                  Made just for you
                </label>
              </div>

              <p class="product_notes">
                I confirm the personalised text and details put here are correct
                as these cannot be changed once submitted.
              </p>
              <p class="order_total">Customizations Total: {{ price }}SR</p>
              <button type="button" class="btn btn-dark" @click="submit">
                ADD TO CART
              </button>
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
import { mapGetters } from "vuex";
import helper from "../mixins/helper";
export default {
  mixins: [helper],
  components: {
    VueSlickCarousel,
  },
  mounted() {
    let slug = this.$route.params.slug;
    this.$store.dispatch("categories/getProductDetails", slug);
  },
  computed: {
    ...mapGetters("categories", ["currentProduct"]),
  },
  data() {
    return {
      form: { notes: "" },
      price: 0,
      priceList: {},
    };
  },
  watch: {
    currentProduct(newProduct) {
      this.price = newProduct.price;
      newProduct.attributes.forEach((attribute) => {
        if (attribute.type == "text") this.form[attribute.name["en"]] = "";
        else {
          this.form[attribute.name["en"]] = attribute.values[0].id;
          this.price += attribute.values[0].price;
          this.price += attribute.price;
          this.priceList[attribute.name["en"]] =
            attribute.price + attribute.values[0].price;
        }
      });
    },
  },
  methods: {
    changeAttributeValue(attribute) {
      if (attribute.type == "dropdown" || attribute.type == "radio") {
        let selectedValue = attribute.values.filter((value) => {
          return value.id == this.form[attribute.name["en"]];
        })[0];
        this.priceList[attribute.name["en"]] =
          attribute.price + selectedValue.price;
      }
      if (attribute.type == "text") {
        if (this.form[attribute.name["en"]].length)
          this.priceList[attribute.name["en"]] = attribute.price;
        else this.priceList[attribute.name["en"]] = 0;
      }
      this.calculatePrice();
    },
    calculatePrice() {
      this.price = this.currentProduct.price;
      Object.keys(this.priceList).forEach((key) => {
        this.price += this.priceList[key];
      });
    },
    submit() {
      if (document.getElementById("form").reportValidity()) {
        let order = {
          product_id: this.currentProduct.id,
          quantity: 1,
          name: this.currentProduct.title,
          notes: this.form.notes,
          details: this.formatOrderDetails(),
          base_price: this.price,
          price: this.price,
          image: this.currentProduct.image_src,
          id: Math.round(Math.random() * 100000),
        };
        this.$store.commit("cart/ADD_ORDER", order);
        this.$router.push({ name: "cart" });
      } else {
        return;
      }
    },
    formatOrderDetails() {
      let formattedDetails = [];
      Object.keys(this.form).forEach((key) => {
        if (key != "notes") {
          let attribute = this.currentProduct.attributes.filter((attribute) => {
            return attribute.name["en"] == key;
          })[0];
          if (attribute.type != "text") {
            let object = {
              name: attribute.name,
              price: attribute.price,
              isText: false,
            };
            let attributeValue = attribute.values.filter((item) => {
              return item.id == this.form[key];
            })[0];
            object.valueName = attributeValue.value;
            object.valuePrice = attributeValue.price;
            formattedDetails.push(object);
          } else if (this.form[key].length) {
            let object = {
              name: attribute.name,
              price: attribute.price,
              isText: true,
              value: this.form[key],
            };
            formattedDetails.push(object);
          }
        }
      });
      return formattedDetails;
    },
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
  .container {
    padding-top: 30px;
  }
}
</style>
