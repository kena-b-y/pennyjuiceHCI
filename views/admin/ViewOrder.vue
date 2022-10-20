<template>
  <div class="row">
    <!-- table primary start -->
    <div class="col-lg-6 mt-5">
      <div class="card">
        <div class="card-body">
          <h4 class="header-title">Order Details</h4>
          <div class="single-table">
            <div class="table-responsive">
              <table class="table text-center">
                <ul class="list-group">
                  <li class="list-group-item">
                    <b>Name :</b> {{ orders.name }}
                  </li>
                  <li class="list-group-item">
                    <b>Phone :</b> {{ orders.phone_no }}
                  </li>
                  <li class="list-group-item">
                    <b>Address :</b> {{ orders.address }}
                  </li>
                  <li class="list-group-item">
                    <b>Cost :</b> {{ orders.order_amount }}
                  </li>
                </ul>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- table primary end -->
    <!-- table success start -->
    <div class="col-lg-6 mt-5">
      <div class="card">
        <div class="card-body">
          <h4 class="header-title">Delivery Details</h4>
          <div class="single-table">
            <div class="table-responsive">
              <table class="table text-center">
                <ul class="list-group">
                  <li class="list-group-item">
                    <b>Center Name :</b> {{ orders.center_name }}
                  </li>
                  <li class="list-group-item">
                    <b>Contact Name :</b> {{ orders.contact_name }}
                  </li>
                  <li class="list-group-item">
                    <b>Contact Email :</b> {{ orders.contact_email }}
                  </li>
                  <li class="list-group-item">
                    <b>Contact Phone :</b> {{ orders.contact_phone_no }}
                  </li>
                  <li class="list-group-item">
                    <b>Delivery Address :</b> {{ orders.delivery_address }}
                  </li>
                </ul>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- table success end -->
  </div>

  <!-- Progress Table start -->
  <div class="col-12 mt-5">
    <div class="card">
      <div class="card-body">
        <div>
          <div class="header-area header-bottom">
            <div class="container">
              <div class="row align-items-center">
                <h4 class="header-title">Order Cart</h4>
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
                  <th scope="col">Product Name</th>
                  <th scope="col">Product Image</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Unit Price</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="detail in details" :key="detail.id">
                  <td>{{ detail.product_name }}</td>
                  <td><img :src="detail.product_image" id="em_photo" /></td>
                  <td>{{ detail.order_quantity }}</td>
                  <td>Ksh. {{ detail.product_price }}</td>
                  <td>Ksh. {{ detail.orderdetails_total }}</td>
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
      errors: {},
      orders: {},
      details: {},
    };
  },
  created() {
    let id = this.$route.params.id;
    axios
      .get("/api/order/details/" + id)
      .then(({ data }) => (this.orders = data))
      .catch(console.log("error"));

    axios
      .get("/api/order/orderdetails/" + id)
      .then(({ data }) => (this.details = data))
      .catch(console.log("error"));
  },

  methods: {},
};
</script>


<style type="text/css">
#em_photo {
  height: 40px;
  width: 40px;
}
</style>