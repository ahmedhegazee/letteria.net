<template >
  <div>
    <div class="content row">
      <div class="main col-sm-12 col-lg-7">
        <div class="header">
          <img src="/images/checkout_logo_4.png" alt="" />
          <div class="sidebar sidbar-mobile">
            <div class="sidbar-header">
              <a data-toggle="collapse" href="#collapseExample" class="row">
                <span
                  ><i class="fas fa-shopping-cart"></i> Show order summary</span
                >
                <span>{{ total }}SR</span>
              </a>
            </div>
            <div class="sidebar-content collapse" id="collapseExample">
              <div
                class="row products"
                v-for="(order, index) in cart"
                :key="index"
              >
                <div class="col-3" style="margin: auto">
                  <div class="product_image">
                    <img :src="'/' + order.image" alt="" />
                    <span class="product_quntity"> {{ order.quantity }} </span>
                  </div>
                </div>
                <div class="col-6">
                  <h5>{{ order.name[currentLanguage] }}</h5>
                  <p v-for="(detail, key) in order.details" :key="key">
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
                  </p>
                  <p>Made just for you: ✓</p>
                </div>
                <div class="col-3 text-right" style="margin: auto">
                  {{ order.price }}SR
                </div>
              </div>
              <div class="row calculations">
                <div class="col-3">Subtotal</div>
                <div
                  class="col-9 text-right"
                  style="font-size: 1em; color: #000; font-weight: 500"
                >
                  {{ total }}
                </div>
                <div class="col-3">Shipping</div>
                <div class="col-9 text-right">Calculated at next step</div>
              </div>
              <div class="row total">
                <div class="col-3" style="color: #000; font-size: 1.4em">
                  Total
                </div>
                <div
                  class="col-9 text-right"
                  style="font-size: 2em; font-weight: 600"
                >
                  {{ total }}
                </div>
              </div>
            </div>
          </div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item prev"><a href="/cart">Cart</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Information
              </li>
              <li class="breadcrumb-item next">Shipping</li>
              <li class="breadcrumb-item next">Payment</li>
              <li class="breadcrumb-item next">Review</li>
            </ol>
          </nav>
        </div>
        <div class="form">
          <div class="contact_information">
            <h3>Contact information</h3>
            <div class="form-group">
              <label for="email">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                v-model="form.email"
              />
              <div class="invalid-feedback" v-if="$v.form.email.$invalid">
                {{ emailErrors[0] }}
              </div>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="specialOrder"
              />
              <label class="form-check-label" for="specialOrder">
                Keep me up to date on news and exclusive offers
              </label>
            </div>
          </div>
          <div class="shipping">
            <h3>Shipping address</h3>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="firstName">First Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="firstName"
                    v-model="form.firstName"
                  />
                  <div
                    class="invalid-feedback"
                    v-if="$v.form.firstName.$invalid"
                  >
                    {{ firstNameErrors[0] }}
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="lastName">Last Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="lastName"
                    v-model="form.lastName"
                  />
                  <div
                    class="invalid-feedback"
                    v-if="$v.form.lastName.$invalid"
                  >
                    {{ lastNameErrors[0] }}
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="company">Company (optional)</label>
              <input
                type="text"
                class="form-control"
                id="company"
                v-model="form.company"
              />
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input
                type="text"
                class="form-control"
                id="address"
                v-model="form.address"
              />
              <div class="invalid-feedback" v-if="$v.form.address.$invalid">
                {{ addressErrors[0] }}
              </div>
            </div>
            <div class="form-group">
              <label for="city">City</label>
              <input
                type="text"
                class="form-control"
                id="city"
                v-model="form.city"
              />
              <div class="invalid-feedback" v-if="$v.form.city.$invalid">
                {{ cityErrors[0] }}
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="country">Country/Region</label>
                  <select
                    class="form-control"
                    id="country"
                    v-model="form.country"
                  >
                    <option disabled>Select Country/Region</option>
                    <option
                      :value="country"
                      v-for="(country, index) in countries"
                      :key="index"
                    >
                      {{ country }}
                    </option>
                  </select>
                  <div class="invalid-feedback" v-if="$v.form.country.$invalid">
                    {{ countryErrors[0] }}
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="governorate">Governorate</label>
                  <select
                    class="form-control"
                    id="governorate"
                    v-model="form.govern"
                  >
                    <option disabled>Select Governorate</option>
                    <option
                      :value="city"
                      v-for="(city, index) in cities"
                      :key="index"
                    >
                      {{ city }}
                    </option>
                  </select>
                  <div class="invalid-feedback" v-if="$v.form.govern.$invalid">
                    {{ governErrors[0] }}
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="postalCode">Postal Code</label>
                  <input
                    type="text"
                    class="form-control"
                    id="postalCode"
                    v-model="form.postcode"
                  />
                  <div
                    class="invalid-feedback"
                    v-if="$v.form.postcode.$invalid"
                  >
                    {{ postcodeErrors[0] }}
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="phone">Phone</label>
              <input
                type="text"
                class="form-control"
                id="phone"
                v-model="form.phone"
              />
              <div class="invalid-feedback" v-if="$v.form.phone.$invalid">
                {{ phoneErrors[0] }}
              </div>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="specialOrder"
              />
              <label class="form-check-label" for="specialOrder">
                Save this information for next time
              </label>
            </div>
            <div class="step-footer row">
              <div class="col-md-6 col-sm-12 return_link_container">
                <router-link to="/cart" class="return-link"
                  >< Return to cart</router-link
                >
              </div>
              <div class="col-md-6 col-sm-12 text-right">
                <!-- <button type="button" class="btn btn-dark">
                Countinue to shipping
              </button> -->
                <button type="button" @click="saveData" class="btn btn-dark">
                  Countinue to shipping
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="footer">All rights reserved Letteria</div>
      </div>
      <div class="col-5 sidebar main-sidebar">
        <div class="sidebar-content">
          <div class="row products" v-for="(order, index) in cart" :key="index">
            <div class="col-3" style="margin: auto">
              <div class="product_image">
                <img :src="'/' + order.image" alt="" />
                <span class="product_quntity"> {{ order.quantity }} </span>
              </div>
            </div>
            <div class="col-6">
              <h5>{{ order.name[currentLanguage] }}</h5>
              <p v-for="(detail, key) in order.details" :key="key">
                {{ formatLabel(detail.name[currentLanguage], detail.price) }}
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
              </p>
              <p>Made just for you: ✓</p>
            </div>
            <div class="col-3 text-right" style="margin: auto">
              {{ order.price }}SR
            </div>
          </div>
          <div class="row calculations">
            <div class="col-3">Subtotal</div>
            <div
              class="col-9 text-right"
              style="font-size: 1em; color: #000; font-weight: 500"
            >
              {{ total }}SR
            </div>
            <div class="col-3">Shipping</div>
            <div class="col-9 text-right">Calculated at next step</div>
          </div>
          <div class="row total">
            <div class="col-3" style="color: #000; font-size: 1.4em">Total</div>
            <div
              class="col-9 text-right"
              style="font-size: 2em; font-weight: 600"
            >
              {{ total }}SR
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mapGetters } from "vuex";
import { required, minLength, email } from "vuelidate/lib/validators";
import helper from "../mixins/helper";
let countries = require("../data/countries.json");
let countriesNames = Object.keys(countries);
export default {
  mixins: [helper],
  mounted() {
    this.form.country = "Saudi Arabia";
    this.cities = countries["Saudi Arabia"];
    if (this.information) {
      this.form = this.information;
    }
  },
  computed: {
    ...mapGetters("cart", ["cart", "total", "information"]),
    emailErrors() {
      const errors = [];
      if (!this.$v.form.email.$dirty) return errors;
      !this.$v.form.email.required && errors.push("Email is required.");
      !this.$v.form.email.email && errors.push("Write valid email");
      return errors;
    },
    firstNameErrors() {
      const errors = [];
      if (!this.$v.form.firstName.$dirty) return errors;
      !this.$v.form.firstName.required &&
        errors.push("First Name is required.");
      !this.$v.form.firstName.minLength &&
        errors.push("First Name must be at least 4 characters.");
      return errors;
    },
    lastNameErrors() {
      const errors = [];
      if (!this.$v.form.lastName.$dirty) return errors;
      !this.$v.form.lastName.required && errors.push("Last Name is required.");
      !this.$v.form.lastName.minLength &&
        errors.push("Last Name must be at least 4 characters.");
      return errors;
    },
    addressErrors() {
      const errors = [];
      if (!this.$v.form.address.$dirty) return errors;
      !this.$v.form.address.required && errors.push("Address is required.");
      !this.$v.form.lastName.minLength &&
        errors.push("Address must be at least 4 characters.");
      return errors;
    },
    cityErrors() {
      const errors = [];
      if (!this.$v.form.city.$dirty) return errors;
      !this.$v.form.city.required && errors.push("City  is required.");
      !this.$v.form.lastName.minLength &&
        errors.push("City must be at least 4 characters.");
      return errors;
    },
    countryErrors() {
      const errors = [];
      if (!this.$v.form.country.$dirty) return errors;
      !this.$v.form.country.required && errors.push("Country  is required.");
      return errors;
    },
    governErrors() {
      const errors = [];
      if (!this.$v.form.govern.$dirty) return errors;
      !this.$v.form.govern.required && errors.push("Governorate is required.");
      return errors;
    },
    postcodeErrors() {
      const errors = [];
      if (!this.$v.form.postcode.$dirty) return errors;
      !this.$v.form.postcode.required && errors.push("Post code is required.");
      return errors;
    },
    phoneErrors() {
      const errors = [];
      if (!this.$v.form.phone.$dirty) return errors;
      !this.$v.form.phone.required && errors.push("Phone is required.");
      return errors;
    },
    currentCountry() {
      return this.form.country;
    },
  },
  validations: {
    form: {
      email: {
        required,
        email,
      },
      firstName: {
        required,
        minLength: minLength(4),
      },
      lastName: {
        required,
        minLength: minLength(4),
      },
      address: {
        required,
        minLength: minLength(4),
      },
      city: {
        required,
        minLength: minLength(4),
      },
      country: {
        required,
      },
      govern: {
        required,
      },
      postcode: {
        required,
      },
      phone: {
        required,
      },
    },
  },
  watch: {
    currentCountry(newCountry, oldCountry) {
      this.cities = countries[newCountry];
    },
  },
  data() {
    return {
      form: {
        firstName: "",
        lastName: "",
        email: "",
        company: "",
        address: "",
        city: "",
        country: "",
        govern: "",
        postcode: "",
        phone: "",
      },
      cities: [],
      countries: countriesNames,
    };
  },
  methods: {
    saveData() {
      this.$v.form.$touch();

      if (this.$v.form.$invalid) {
        return;
      }
      this.$store.commit("cart/SET_INFORMATION", this.form);
      this.$router.push("/shipping");
    },
  },
};
</script>
<style scoped>
.invalid-feedback {
  display: block;
}
.content {
  max-width: 90%;
  margin: auto;
}
.main,
.sidebar {
  padding-top: 4em;
}
.main {
  padding-right: 6%;
}
body {
  background: #fff !important;
}
#content {
  text-align: left !important;
}
.sidebar::after {
  left: 0;
  background-position: left top;
  -webkit-box-shadow: 1px 0 0 #e1e1e1 inset;
  box-shadow: 1px 0 0 #e1e1e1 inset;
  content: "";
  display: block;
  width: 300%;
  position: absolute;
  top: 0;
  bottom: 0;
  background: #fafafa;
  z-index: -1;
  -webkit-box-shadow: 0 -1px 0 #e1e1e1 inset;
  box-shadow: 0 -1px 0 #e1e1e1 inset;
  height: 100%;
}
.sidebar {
  border-left: 1px solid #e1e1e1;
  padding-left: 4%;
  font-size: 12px !important;
  /* height: 100vh; */
}
.sidebar p {
  margin-bottom: 0 !important;
}
.breadcrumb {
  background: transparent;
}
.breadcrumb-item + .breadcrumb-item::before {
  content: ">";
}
.breadcrumb-item.active {
  color: #333333;
}
.breadcrumb-item.prev {
  color: #bc9c66;
}
.breadcrumb-item.next {
  color: #737373;
}
.header {
  padding-bottom: 2em;
}
.shipping {
  padding-top: 3em;
}
.btn-dark {
  color: #fff !important;
}
.form {
  padding-bottom: 4em;
}
.footer {
  padding: 1em 0;
  border-top: 1px solid #e6e6e6;
}
.step-footer {
  margin-top: 1.5em;
  /* justify-content: space-between; */
  padding: 0 15px;
}
h3 {
  margin-bottom: 1.5em;
}
.product_image {
  position: relative;
  width: 4.6em;
  height: 4.6em;
}
.product_image img {
  width: 100%;
  border-radius: 8px;
  border: 1px solid #aaa;
}
.product_image .product_quntity {
  font-size: 1em;
  font-weight: 500;
  line-height: 1.75em;
  white-space: nowrap;
  text-align: center;
  border-radius: 1.75em;
  background-color: rgba(114, 114, 114, 0.9);
  color: #fff;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  min-width: 1.75em;
  height: 1.75em;
  padding: 0 0.5833333333em;
  position: absolute;
  right: -0.75em;
  top: -0.75em;
  z-index: 3;
}
.products {
  padding-bottom: 20px;
  border-bottom: 1px solid #e1e1e1;
}
.calculations {
  color: #535353;
  border-bottom: 1px solid #e1e1e1;
  padding-bottom: 20px;
  padding-top: 15px;
}
.main-sidebar {
  display: block;
}
.sidbar-mobile {
  padding: 0;
  background: #fafafa;
  border: none;
  display: none;
}
.sidbar-mobile .sidbar-header {
  height: auto;
  background: #fafafa;
  border-top: 1px solid #e6e6e6;
  border-bottom: 1px solid #e6e6e6;
  padding: 1.25em 0;
}
.sidbar-header a {
  justify-content: space-between;
  width: 90%;
  margin: auto;
}
.sidbar-header span:first-of-type {
  color: #b7955c;
  font-size: 1.4em;
}
.sidbar-header span:last-of-type {
  font-weight: 600;
}

@media (max-width: 768px) {
  .sidbar-mobile {
    display: block;
  }
  .content {
    max-width: 100%;
  }
  .breadcrumb {
    font-size: 0.8em;
  }
  .header {
    padding-bottom: 0em;
  }
  .main-sidebar {
    display: none;
  }
  .sidebar::after {
    display: none;
  }
  .main {
    padding-right: 0;
    padding-left: 0;
  }
  .form,
  .sidebar-content {
    padding: 0 15px;
  }
  .footer {
    padding-right: 15px;
    padding-left: 15px;
  }
}
</style>
