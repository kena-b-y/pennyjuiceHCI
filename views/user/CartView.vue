<template :key="reload1">
  <Nav :key="reload1" />

  <div class="wrapper">
    <h1 class="title">
      <ion-icon class="icon" name="cart-outline"></ion-icon> Shopping Cart
    </h1>
    <div class="project">
      <div class="shop">
        <div v-for="cart in carts" :key="cart.id" class="box">
          <div class="img-box">
            <img :src="cart.product_image" />
          </div>
          <div class="content">
            <h3>{{ cart.product_name }}</h3>
            <h4>
              Unit Price:
              <span class="price">Ksh. {{ cart.product_price }}</span>
            </h4>
            <h4 class="btn-area2">
              Price:<span class="price">{{ cart.sub_total }}</span>
            </h4>
            <p class="unit">
              Quantity:
              <span>
                <button
                  class="btn btn-link px-2"
                  onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                  @click.prevent="increment(cart.id)"
                >
                  <i class="fa fa-plus text-success"></i>
                </button>
                <input
                  min="0"
                  name="quantity"
                  type="number"
                  readonly=""
                  :value="cart.product_quantity"
                />
                <button
                  class="btn btn-link px-2"
                  onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                  @click.prevent="decrement(cart.id)"
                >
                  <i class="fa fa-minus text-danger"></i>
                </button>
              </span>
            </p>
            <p class="btn-area" @click="removeItem(cart.id)">
              <ion-icon class="delete-icon" name="trash-sharp"></ion-icon>
            </p>
          </div>
        </div>
      </div>
      <CartItem :key="reload1" />
    </div>
  </div>
</template>

<script type="text/javascript">
import Nav from "./Nav.vue";
import CartItem from "./CartItem.vue";

export default {
  components: {
    Nav,
    CartItem,
  },
  created() {
    if (!User.loggedIn()) {
      this.$router.push({ name: "login" });
    }
  },
  created() {
    this.allProduct();
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

      products: [],
      searchTerm: "",
      carts: [],
      reload1: 0,
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
    price() {
      let sum = 0;
      sum =
        parseFloat(this.carts.product_quantity) *
        parseFloat(this.carts.product_price);
      return sum;
    },
    customerid() {
      const userid = User.id();
      return userid;
    },
    bei() {
      let sum = 0;
      sum =
        parseFloat(this.carts.product_quantity) *
        parseFloat(this.carts.product_price);
    },
  },

  methods: {
    // Cart Methods Here
    AddToCart(id) {
      // alert(id)
      axios
        .get("/api/addToCart/" + id)
        .then(() => {
          this.reload1++;
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
          this.reload1++;
          Notification.cart_delete();
        })
        .catch();
    },
    increment(id) {
      axios
        .get("/api/increment/" + id)
        .then(() => {
          this.reload1++;
          Notification.success();
        })
        .catch();
    },
    decrement(id) {
      axios
        .get("/api/decrement/" + id)
        .then(() => {
          this.reload1++;
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
        order_amount: total,
      };

      axios.post("/api/orderdone", data).then(() => {
        Notification.success();
        this.$router.push({ name: "home" });
      });
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
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600&display=swap");

/* body {
  background: #ffe3e2;
} */

.wrapper {
  max-width: 1000px;
  margin: 0 auto;
}

.wrapper h1 {
  font-size: 30px;
  padding: 20px 0;
  text-align: center;
  text-transform: uppercase;
}

.project {
  display: flex;
}

.shop {
  flex: 75%;
}

.box {
  display: flex;
  width: 100%;
  height: 200px;
  overflow: hidden;
  margin-bottom: 20px;
  background: #fff;
  transition: all 0.6s ease;
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}

.box:hover {
  border: none;
  transform: scale(1.03);
}

.box img {
  width: 240px;
  height: 200px;
}

.content {
  padding: 20px;
  width: 100%;
  position: relative;
}

.content h3 {
  font-size: 18px;
  margin-bottom: 30px;
  color: #555;
}

.content h4 {
  font-size: 14px;
  font-weight: normal;
  margin-bottom: 50px;
}

span.price {
  font-weight: bold;
}

.btn-area {
  position: absolute;
  bottom: 20px;
  right: 20px;
  padding: 10px 25px;
  background-color: #940a0a;
  color: white;
  cursor: pointer;
  border-radius: 5px;
}
.btn-area2 {
  position: absolute;
  bottom: 65px;
  right: 20px;
  margin-right: 5px;
}

.btn-area .delete-icon {
  font-size: 11px;
}

.btn-area:hover {
  background-color: #d42c34;
  color: #fff;
  font-weight: 600;
}

.unit {
  font-size: 14px;
}

.unit input {
  width: 40px;
  padding: 5px;
  text-align: center;
}

.btn-area i {
  margin-right: 5px;
}

.right-bar {
  flex: 25%;
  margin-left: 20px;
  padding: 20px;
  height: 200px;
  border-radius: 5px;
  background: #fff;
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}

.right-bar hr {
  margin-bottom: 25px;
}

.right-bar p {
  display: flex;
  justify-content: space-between;
  margin-bottom: 30px;
  font-size: 20px;
}

.right-bar a {
  background-color: #76bfb6;
  color: #fff;
  text-decoration: none;
  display: block;
  text-align: center;
  height: 40px;
  line-height: 40px;
  font-weight: 900;
  font-size: 14px;
}

.right-bar i {
  margin-right: 15px;
}

.right-bar a:hover {
  background-color: #3972a7;
}

@media screen and (max-width: 700px) {
  .content h3 {
    margin-bottom: 15px;
  }
  .content h4 {
    margin-bottom: 20px;
  }
  .btn2 {
    display: none;
  }
  .box {
    height: 150px;
  }
  .box img {
    height: 150px;
    width: 200px;
  }
}

@media screen and (max-width: 900px) {
  .project {
    flex-direction: column;
  }
  .right-bar {
    margin-left: 0;
    margin-bottom: 20px;
  }
}

@media screen and (max-width: 1250px) {
  .wrapper {
    max-width: 95%;
  }
}
</style>