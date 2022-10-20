<template>
  <Nav :key="reload" />

  <div class="container">
    <h3 class="title">PennyJuice Products</h3>

    <div class="products-container">
      <div
        class="product preview"
        data-name="{{ product.product_id }}"
        v-for="product in filtersearch"
        :key="product.product_id"
      >
        <img :src="product.product_image" />
        <h3>{{ product.product_name }}</h3>
        <div class="price">Ksh. {{ product.unit_price }}</div>
        <div class="buttons">
          <button class="cart" @click.prevent="AddToCart(product.product_id)">
            Add to cart
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="products-preview">
    <div
      class="preview"
      data-target="{{ product.product_id}}"
      v-for="product in filtersearch"
      :key="product.product_id"
    >
      <i class="fas fa-times"></i>
      <img :src="product.product_image" alt="" />
      <h3>{{ product.product_name }}</h3>
      <div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
        <span>( 250 )</span>
      </div>
      <p>Farm fresh {{ product.product_name }}</p>
      <div class="price">Ksh. {{ product.unit_price }}</div>
      <div class="buttons">
        <input type="number" min="1" placeholder="Quantity" />
        <button class="cart" @click.prevent="AddToCart(product.product_id)">
          Add to cart
        </button>
      </div>
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
      reload: 0,
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
      //  alert(User.name())
      axios
        .get("/api/addToCart/" + id)
        .then(() => {
          this.reload++;
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
        customer_id: this.customerid,
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
};
</script>


<style type="text/css">
#em_photo {
  height: 40px;
  width: 40px;
}
</style>