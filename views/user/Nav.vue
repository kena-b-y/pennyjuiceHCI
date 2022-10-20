<template>
  <header class="header">
    <router-link class="main-nav-link" to="/home">
      <img
        src="../.././assets/user/assets/img/pennyjuice_logo.png"
        alt="Omnifood logo"
        class="logo"
      />
    </router-link>
    <nav class="main-nav">
      <ul class="main-nav-list">
        <li>
          <router-link class="main-nav-link" to="/home">Home</router-link>
        </li>
        <li>
          <router-link class="main-nav-link" to="/childcare"
            >Childcare</router-link
          >
        </li>
        <li>
          <router-link class="main-nav-link" to="/products">Juice</router-link>
        </li>
        <li>
          <div class="navbar dropdown-toggle" data-toggle="dropdown">
            <div class="nav_right">
              <ul>
                <li class="nr_li dd_main">
                  <ion-icon name="person-outline"></ion-icon>

                  <div class="dropdown-menu">
                    <router-link to="/trackorder" class="dropdown-item">
                      Track Order</router-link
                    >
                    <router-link to="/logout" class="dropdown-item"
                      >Log Out</router-link
                    >
                  </div>
                </li>
              </ul>
            </div>
            <span class="main-nav-link">
              <strong>{{ username }}</strong></span
            >
          </div>
        </li>
        <li>
          <router-link class="main-nav-link cart-btn" to="/cart"
            ><span><ion-icon class="icon" name="cart-outline"></ion-icon></span
            ><span class="badge badge-light">{{ qty }}</span></router-link
          >
        </li>
      </ul>
    </nav>
  </header>
</template>
<script>
export default {
  created() {
    this.allProduct();
    this.cartProduct();
    // Reload.$on("AfterAdd", () => {
    //   this.cartProduct();
    // });
  },

  data() {
    return {
      products: [],
      searchTerm: "",
      carts: [],
      getorders: [],
      getsearchTerm: "",
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
    username() {
      const usernamed = User.name();
      return usernamed;
    },
    customerid() {
      const userid = User.id();
      return userid;
    },
  },

  methods: {
    // Cart Methods Here
    AddToCart(id) {
      //  alert(User.name())
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
          Reload.$emit("AfterAdd");
          Notification.success();
        })
        .catch();
    },
    decrement(id) {
      axios
        .get("/api/decrement/" + id)
        .then(() => {
          Reload.$emit("AfterAdd");
          Notification.success();
        })
        .catch();
    },
    vat() {
      axios
        .get("/api/vats/")
        .then(({ data }) => (this.vats = data))
        .catch();
    },
    orderdone() {
      let total = (this.subtotal * this.vats.vat) / 100 + this.subtotal;
      var data = {
        qty: this.qty,
        subtotal: this.subtotal,
        customer_id: this.customer_id,
        payby: this.payby,
        pay: this.pay,
        due: this.due,
        vat: this.vats.vat,
        total: total,
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
  trackOrders(id) {
    axios
      .get("/api/getting/order/" + id)
      .then(({ data }) => (this.getorders = data))
      .catch();
  },
};
</script>