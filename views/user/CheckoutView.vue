<template>
  <Nav />
  <div class="wrapper"></div>
  <div class="col-lg-6 col-ml-12">
    <div class="row">
      <!-- basic form start -->
      <div class="py-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-7">
              <div class="card border border-secondary">
                <div class="card-body">
                  <form @submit.prevent="orderdone">
                    <h4>Delivery Details</h4>
                    <hr />
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="centerName">Center Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="centerName"
                          placeholder="Center Name"
                          v-model="center_name"
                        />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="contactName">Contact Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="contactName"
                          placeholder="Contact Name"
                          v-model="contact_name"
                        />
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="contactPhone">Contact Phone</label>
                        <input
                          type="tel"
                          class="form-control"
                          id="contactPhone"
                          placeholder="+254..."
                          v-model="contact_phone_no"
                        />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="contactEmail">Contact Email</label>
                        <input
                          type="email"
                          class="form-control"
                          id="contactEmail"
                          placeholder="example@gmail.com"
                          v-model="contact_email"
                        />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="deliveryAddress">Delivery Address</label>
                      <input
                        type="text"
                        class="form-control"
                        id="deliveryAddress"
                        placeholder="1234 Main St"
                        v-model="delivery_address"
                      />
                    </div>

                    <h4>Secure Payment</h4>
                    <hr />
                    <span class="type d-block mt-3 mb-1"
                      ><strong>Card type</strong></span
                    ><label class="radio">
                      <input
                        type="radio"
                        name="card"
                        value="2"
                        v-model="payment_type"
                      />
                      <span
                        ><img
                          width="30"
                          src="https://img.icons8.com/color/48/000000/mastercard.png"
                      /></span>
                    </label>

                    <label class="radio">
                      <input
                        type="radio"
                        name="card"
                        value="1"
                        v-model="payment_type"
                      />
                      <span
                        ><img
                          width="30"
                          src="https://img.icons8.com/officel/48/000000/visa.png"
                      /></span>
                    </label>

                    <label class="radio">
                      <input type="radio" name="card" value="4" />
                      <span
                        ><img
                          width="30"
                          src="https://img.icons8.com/ultraviolet/48/000000/amex.png"
                      /></span>
                    </label>

                    <label class="radio">
                      <input
                        type="radio"
                        name="card"
                        value="3"
                        v-model="payment_type"
                      />
                      <span
                        ><img
                          width="30"
                          src="https://img.icons8.com/officel/48/000000/paypal.png"
                      /></span>
                    </label>

                    <div class="form-group">
                      <label for="cardName">Name on Card</label>
                      <input
                        type="text"
                        class="form-control"
                        id="cardName"
                        placeholder="Name on Card"
                        v-model="card_name"
                      />
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="cardNumber">Credit Card Number</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter Card Number"
                          v-model="card_no"
                        />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="cardCVV">Card CVC</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="CVC"
                          v-model="cvv"
                        />
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="expiryMonth">Expiry Month</label>
                        <select
                          class="form-control form-select form-select-lg mb-3"
                          name=""
                          v-model="expirationMonth"
                        >
                          <option value=""><strong>Month</strong></option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="expiryYear">Expiry Year</label>
                        <input
                          type="year"
                          class="form-control"
                          id="expiryYear"
                          placeholder="Year"
                          v-model="expirationYear"
                        />
                      </div>
                    </div>

                    <div class="d-flex justify-content-between information">
                      <span class="font-weight-bold">Subtotal:</span
                      ><span>Ksh. {{ subtotal }}</span>
                    </div>

                    <div class="d-flex justify-content-between information">
                      <span class="font-weight-bold">Total (Incl. Taxes): </span
                      ><span>Ksh. {{ subtotal }}</span>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                      Checkout &rarr;
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- basic form end -->
    </div>
  </div>
</template>

<script type="text/javascript">
import Nav from "./Nav.vue";

export default {
  components: {
    Nav,
  },
  created() {
    if (!User.loggedIn()) {
      this.$router.push({ name: "login" });
    }
  },
  created() {
    this.cartProduct();
    //  Reload.$on("AfterAdd", () => {
    //    this.cartProduct();
    //  });
  },

  data() {
    return {
      center_name: "",
      contact_phone_no: "",
      contact_name: "",
      contact_email: "",
      delivery_address: "",
      payment_type: "",
      card_name: "",
      expirationMonth: "",
      expirationYear: "",
      cvv: "",
      card_no: "",

      searchTerm: "",
      carts: [],
      getorders: [],
    };
  },
  computed: {
    filtersearch() {
      return this.products.filter((product) => {
        return product.product_name.match(this.searchTerm);
      });
    },
    qty() {
      let sum = 0;
      for (let i = 0; i < this.carts.length; i++) {
        sum += parseFloat(this.carts[i].product_quantity);
      }
      return sum;
    },
    subtotal() {
      let sum = 0;
      for (let i = 0; i < this.carts.length; i++) {
        sum +=
          parseFloat(this.carts[i].product_quantity) *
          parseFloat(this.carts[i].product_price);
      }
      return sum;
    },
    customerid() {
      const userid = User.id();
      return userid;
    },
  },

  methods: {
    // Cart Methods Here
    AddToCart(id) {
      // alert(id)
      axios
        .get("/api/addToCart/" + id)
        .then(() => {
          // Reload.$emit("AfterAdd");
          Notification.cart_success();
        })
        .catch();
    },
    cartProduct() {
      axios
        .get("/api/cart/product/")
        .then(({ data }) => (this.carts = data))
        .catch();
    },
    removeItem(id) {
      axios
        .get("/api/remove/cart/" + id)
        .then(() => {
          // Reload.$emit("AfterAdd");
          Notification.cart_delete();
        })
        .catch();
    },
    increment(id) {
      axios
        .get("/api/increment/" + id)
        .then(() => {
          // Reload.$emit("AfterAdd");
          Notification.success();
        })
        .catch();
    },
    decrement(id) {
      axios
        .get("/api/decrement/" + id)
        .then(() => {
          // Reload.$emit("AfterAdd");
          Notification.success();
        })
        .catch();
    },
    orderdone() {
      let total = this.subtotal;
      var data = {
        qty: this.qty,
        subtotal: this.subtotal,
        customer_id: this.customerid,
        center_name: this.center_name,
        contact_phone_no: this.contact_phone_no,
        contact_name: this.contact_name,
        contact_email: this.contact_email,
        delivery_address: this.delivery_address,
        payment_type: this.payment_type,
        expirationMonth: this.expirationMonth,
        expirationYear: this.expirationYear,
        card_name: this.card_name,
        cvv: this.cvv,
        card_no: this.card_no,
        order_amount: total,
      };

      axios.post("/api/orderdone", data).then(() => {
        Notification.success();
        this.$router.push({ name: "trackorder" });
      });
    },

    track(id) {
      axios
        .get("/api/getting/order/" + id)
        .then(({ data }) => (this.getorders = data))
        .catch();
    },

    // End Cart Methods

    allProduct() {
      axios
        .get("/api/product/")
        .then(({ data }) => (this.products = data))
        .catch();
    },
    deleteUserdetail(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete Product!",
      }).then((result) => {
        if (result.value) {
          axios
            .delete("/api/product/" + id)
            .then(() => {
              this.products = this.products.filter((product) => {
                return product.product_id != id;
              });
            })
            .catch(() => {
              this.$router.push({ name: "allProducts" });
            });
          Swal.fire("Deleted!", "Your product has been deleted.", "success");
        }
      });
    },
  },
};
</script>

