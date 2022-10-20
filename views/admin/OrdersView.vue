<template>
  <!-- Progress Table start -->
  <div class="col-12 mt-5">
    <div class="card">
      <div class="card-body">
        <div>
          <div class="header-area header-bottom">
            <div class="container">
              <div class="row align-items-center">
                <h4 class="header-title">Orders Table</h4>
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
                  <th scope="col">Order ID</th>
                  <th scope="col">Customer ID</th>
                  <th scope="col">Customer Name</th>
                  <th scope="col">Order Amount</th>
                  <th scope="col">Order Status</th>
                  <th scope="col">action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="order in filtersearch" :key="order.order_id">
                  <td>{{ order.order_id }}</td>
                  <td>{{ order.customer_id }}</td>
                  <td>{{ order.name }}</td>
                  <td>Ksh.{{ order.order_amount }}</td>
                  <td>
                    <span
                      class="status-p bg-primary"
                      v-if="order.order_status == 'Processing'"
                      >{{ order.order_status }}</span
                    >
                    <span
                      class="status-p bg-danger"
                      v-else-if="order.order_status == 'Cancelled'"
                      >{{ order.order_status }}</span
                    >
                    <span
                      class="status-p bg-success"
                      v-else-if="order.order_status == 'Shipping'"
                      >{{ order.order_status }}</span
                    >
                    <span
                      class="status-p bg-success"
                      v-else-if="order.order_status == 'Ready'"
                      >{{ order.order_status }}</span
                    >
                    <span
                      class="status-p bg-secondary"
                      v-else-if="order.order_status == 'Delivered'"
                      >{{ order.order_status }}</span
                    >
                  </td>
                  <td>
                    <ul class="d-flex justify-content-center">
                      <li class="mr-3">
                        <router-link
                          :to="{
                            name: 'viewOrder',
                            params: { id: order.order_id },
                          }"
                          class="text-secondary"
                          ><i class="fa fa-eye"></i
                        ></router-link>
                      </li>
                      <li class="mr-3">
                        <router-link
                          :to="{
                            name: 'editOrder',
                            params: { id: order.order_id },
                          }"
                          class="text-secondary"
                          ><i class="fa fa-edit"></i
                        ></router-link>
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
      orders: [],
      searchTerm: "",
    };
  },
  computed: {
    filtersearch() {
      return this.orders.filter((order) => {
        return order.name.match(this.searchTerm);
      });
    },
  },

  methods: {
    allOrder() {
      axios
        .get("/api/orders/")
        .then(({ data }) => (this.orders = data))
        .catch();
    },
  },
  created() {
    this.allOrder();
  },
};
</script>


<style type="text/css">
#em_photo {
  height: 40px;
  width: 40px;
}
</style>