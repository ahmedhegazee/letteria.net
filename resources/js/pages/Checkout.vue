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
                <span>£24.00</span>
              </a>
            </div>
            <div class="sidebar-content collapse" id="collapseExample">
              <div class="row products">
                <div class="col-3" style="margin: auto">
                  <div class="product_image">
                    <img src="/images/product1.jpg" alt="" />
                    <span class="product_quntity">1</span>
                  </div>
                </div>
                <div class="col-6">
                  <h5>2 cm Bar Necklace (max. 5 characters)</h5>
                  <p>BAR COLOUR: Silver</p>
                  <p>BAR HANGING: Horizontal</p>
                  <p>FRONT TEXT: dsfds</p>
                  <p>TEXT ALIGNMENT: Right</p>
                  <p>CHAIN LENGTH: 16"-18" (ADJUSTABLE)</p>
                  <p>Made just for you: ✓</p>
                </div>
                <div class="col-3 text-right" style="margin: auto">£24.00</div>
              </div>
              <div class="row calculations">
                <div class="col-3">Subtotal</div>
                <div
                  class="col-9 text-right"
                  style="font-size: 1em; color: #000; font-weight: 500"
                >
                  £24.00
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
                  £24.00
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
              <input type="email" class="form-control" id="email" />
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
                  <input type="text" class="form-control" id="firstName" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="lastName">Last Name</label>
                  <input type="text" class="form-control" id="lastName" />
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="company">Company (optional)</label>
              <input type="text" class="form-control" id="company" />
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" />
            </div>
            <div class="form-group">
              <label for="city">City</label>
              <input type="text" class="form-control" id="city" />
            </div>
            <div class="row">
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="country">Country/Region</label>
                  <select class="form-control" id="country">
                    <option disabled>Select Country/Region</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="governorate">Governorate</label>
                  <select class="form-control" id="governorate">
                    <option disabled>Select Governorate</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="postalCode">Postal Code</label>
                  <input type="text" class="form-control" id="postalCode" />
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" />
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
              <a href="/cart">< Return to cart</a>
              <!-- <button type="button" class="btn btn-dark">
                Countinue to shipping
              </button> -->
              <a href="/shipping" class="btn btn-dark">
                Countinue to shipping
              </a>
            </div>
          </div>
        </div>
        <div class="footer">All rights reserved Letteria</div>
      </div>
      <div class="col-5 sidebar main-sidebar">
        <div class="sidebar-content">
          <div class="row products">
            <div class="col-3" style="margin: auto">
              <div class="product_image">
                <img src="/images/product1.jpg" alt="" />
                <span class="product_quntity">1</span>
              </div>
            </div>
            <div class="col-6">
              <h5>2 cm Bar Necklace (max. 5 characters)</h5>
              <p>BAR COLOUR: Silver</p>
              <p>BAR HANGING: Horizontal</p>
              <p>FRONT TEXT: dsfds</p>
              <p>TEXT ALIGNMENT: Right</p>
              <p>CHAIN LENGTH: 16"-18" (ADJUSTABLE)</p>
              <p>Made just for you: ✓</p>
            </div>
            <div class="col-3 text-right" style="margin: auto">£24.00</div>
          </div>
          <div class="row calculations">
            <div class="col-3">Subtotal</div>
            <div
              class="col-9 text-right"
              style="font-size: 1em; color: #000; font-weight: 500"
            >
              £24.00
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
              £24.00
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>
<style scoped>
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
  justify-content: space-between;
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
