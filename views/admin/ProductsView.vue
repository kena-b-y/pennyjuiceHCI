<template>
  <!-- Progress Table start -->
  <div class="col-12 mt-5">
    <div class="card">
      <div class="card-body">
        <div>
          <div class="header-area header-bottom">
            <div class="container">
              <div class="row align-items-center">
                <h4 class="header-title">Products Table</h4>
                <div class="col-lg-3 clearfix">
                  <div class="search-box">
                    <form action="#">
                      <input
                        type="text"
                        v-model="searchTerm"
                        name="search"
                        placeholder="Search..."
                        required
                      />
                      <i class="ti-search"></i>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="single-table">
          <div class="table-responsive">
            <table class="table table-hover progress-table text-center">
              <thead class="text-uppercase">
                <tr>
                  <th scope="col">Product ID</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Product Description</th>
                  <th scope="col">Product Image</th>
                  <th scope="col">Unit Price></th>
                  <th scope="col">Available Quantity</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="product in filtersearch" :key="product.product_id">
                  <td>{{ product.product_id }}</td>
                  <td>{{ product.product_name }}</td>
                  <td>{{ product.product_description }}</td>
                  <td><img :src="product.product_image" id="em_photo" /></td>
                  <td>{{ product.unit_price }}</td>
                  <td>{{ product.available_quantity }}</td>
                  <td>
                    <ul class="d-flex justify-content-center">
                      <li class="mr-3">
                        <router-link
                          :to="{
                            name: 'editProduct',
                            params: { id: product.product_id },
                          }"
                          class="text-secondary"
                          ><i class="fa fa-edit"></i
                        ></router-link>
                      </li>
                      <li>
                        <a
                          @click="deleteUserdetail(product.product_id)"
                          class="text-danger"
                          ><i class="ti-trash"></i
                        ></a>
                      </li>
                    </ul>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Progress Table end -->
</template>

<script type="text/javascript">
export default {
  created() {
    if (!User.loggedIn()) {
      this.$router.push({ name: "login" });
    }
  },
  data() {
    return {
      products: [],
      searchTerm: "",
    };
  },
  computed: {
    filtersearch() {
      return this.products.filter((product) => {
        return product.product_name.match(this.searchTerm);
      });
    },
  },

  methods: {
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
  created() {
    this.allProduct();
  },
};
</script>


<style type="text/css">
#em_photo {
  height: 40px;
  width: 40px;
}
</style>