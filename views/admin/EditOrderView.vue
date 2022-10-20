<template>
  <div class="col-lg-6 col-ml-12">
    <div class="row">
      <!-- basic form start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <h4 class="header-title">Update Order Details</h4>
            <form
              class="user"
              @submit.prevent="orderUpdate"
              enctype="multipart/form-data"
            >
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="example-text-input" class="col-form-label"
                      >Center Name</label
                    >
                    <input
                      class="form-control"
                      type="text"
                      id="example-text-input"
                      placeholder="Enter Center Name"
                      v-model="form.center_name"
                    />
                    <small class="text-danger" v-if="errors.center_name">
                      {{ errors.center_name[0] }}
                    </small>
                  </div>
                  <div class="col-md-6">
                    <label for="example-text-input" class="col-form-label"
                      >Contact Name</label
                    >
                    <input
                      class="form-control"
                      type="text"
                      id="example-text-input"
                      placeholder="Enter Contact Name"
                      v-model="form.contact_name"
                    />
                    <small class="text-danger" v-if="errors.contact_name">
                      {{ errors.contact_name[0] }}
                    </small>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="exampleInputEmail1"
                      >Contact Email address</label
                    >
                    <input
                      type="email"
                      class="form-control"
                      id="exampleInputEmail1"
                      aria-describedby="emailHelp"
                      placeholder="Enter Contact email"
                      v-model="form.contact_email"
                    />
                    <small class="text-danger" v-if="errors.contact_email">
                      {{ errors.contact_email[0] }}
                    </small>
                  </div>
                  <div class="col-md-6">
                    <label for="example-text-input" class="col-form-label"
                      >Contact Phone Number</label
                    >
                    <input
                      class="form-control"
                      type="tel"
                      id="example-text-input"
                      placeholder="Enter Contact Phone Number"
                      v-model="form.contact_phone_no"
                    />
                    <small class="text-danger" v-if="errors.contact_phone_no">
                      {{ errors.contact_phone_no[0] }}
                    </small>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="exampleInputEmail1">Delivery Address</label>
                    <input
                      class="form-control"
                      type="text"
                      id="example-text-input"
                      placeholder="Enter Delivery Address"
                      v-model="form.delivery_address"
                    />
                    <small class="text-danger" v-if="errors.delivery_address">
                      {{ errors.delivery_address[0] }}
                    </small>
                  </div>
                  <div class="col-md-6">
                    <label class="col-form-label">Order Status</label>
                    <select class="form-control" v-model="form.order_status">
                      <option disabled value="">Please select one</option>
                      <option value="Processing">Processing</option>
                      <option value="Ready">Ready</option>
                      <option value="Shipping">Shipping</option>
                      <option value="Delivered">Delivered</option>
                      <option value="Cancelled">Cancelled</option>
                    </select>

                    <small class="text-danger" v-if="errors.order_status">
                      {{ errors.order_status[0] }}
                    </small>
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">
                Update
              </button>
            </form>
          </div>
        </div>
      </div>
      <!-- basic form end -->
    </div>
  </div>
</template>

<script type="text/javascript">
export default {
  created() {
    if (!User.loggedIn()) {
      this.$router.push({ name: "/" });
    }
  },

  data() {
    return {
      form: {
        center_name: "",
        contact_name: "",
        contact_email: "",
        contact_phone_no: "",
        delivery_address: "",
        order_status: "",
      },
      errors: {},
    };
  },
  created() {
    let id = this.$route.params.id;
    axios
      .get("/api/order/" + id)
      .then(({ data }) => (this.form = data))
      .catch(console.log("error"));
  },

  methods: {
    orderUpdate() {
      let id = this.$route.params.id;
      axios
        .patch("/api/order/" + id, this.form)
        .then(() => {
          this.$router.push({ name: "allOrders" });
          Notification.success();
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },

  },
};
</script>
