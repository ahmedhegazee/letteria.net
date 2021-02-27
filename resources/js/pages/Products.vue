<template >
  <div class="container">
    <div class="header">
      <h1>LETTER BAR</h1>
      <hr class="hr--small" />
      <p>
        We use the old fashioned method of lettering. Each piece is hand stamped
        and crafted capturing your unique self. Names, initials, special dates,
        words of inspiration absolutely anything you like add that personal
        touch.
      </p>
    </div>
    <div class="products">
      <div class="row">
        <div class="col-md-7 col-sm-12">
          <a href="/products/1">
            <div class="product first-product">
              <img src="/images/product1.jpg" />
            </div>
            <div class="product-title">
              <span>2 cm Bar Necklace (max. 5 characters)</span
              ><span>—£24</span>
            </div>
          </a>
        </div>
        <div class="col-md-5 col-sm-12">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <a href="#">
                <div class="product" style="height: 245px">
                  <img src="/images/product2.jpg" />
                </div>
                <div class="product-title">
                  <span>3 cm Bar Necklace (max. 9 characters)</span
                  ><span>—£29</span>
                </div>
              </a>
            </div>
            <div class="col-md-12 col-sm-12">
              <a href="#">
                <div class="product" style="height: 245px">
                  <img src="/images/product3.jpg" />
                </div>
                <div class="product-title">
                  <span>4 cm Bar Necklace (max. 13 characters)</span
                  ><span>—£24</span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <a href="#">
            <div class="product" style="height: 310px">
              <img src="/images/product5.jpg" />
            </div>
            <div class="product-title">
              <span>Double Bar Necklace</span><span>—£34</span>
            </div>
          </a>
        </div>
        <div class="col-md-6 col-sm-12">
          <a href="#">
            <div class="product" style="height: 310px">
              <img src="/images/product4.jpg" />
            </div>
            <div class="product-title">
              <span>Triple Bar Necklace</span><span>—£44</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
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
