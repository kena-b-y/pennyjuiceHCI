<template>
  <div class="col-lg-6 col-ml-12">
    <div class="row">
      <!-- basic form start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <h4 class="header-title">Update Product</h4>
            <form
              class="user"
              @submit.prevent="productUpdate"
              enctype="multipart/form-data"
            >
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="example-text-input" class="col-form-label"
                      >Product Name</label
                    >
                    <input
                      class="form-control"
                      type="text"
                      id="example-text-input"
                      placeholder="Enter product Name"
                      v-model="form.product_name"
                    />
                    <small class="text-danger" v-if="errors.product_name">
                      {{ errors.product_name[0] }}
                    </small>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Product Description</label>
                <textarea
                  class="form-control"
                  placeholder="Enter Product Description"
                  v-model="form.product_description"
                />
                <small class="text-danger" v-if="errors.product_description">
                  {{ errors.product_description[0] }}
                </small>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="exampleInputPassword1">Unit Price</label>
                    <input
                      type="number"
                      class="form-control"
                      placeholder="Enter Unit Price"
                      v-model="form.unit_price"
                    />
                    <small class="text-danger" v-if="errors.unit_price">
                      {{ errors.unit_price[0] }}
                    </small>
                  </div>
                  <div class="col-md-6">
                    <label for="exampleInputPassword1"
                      >Available Quantity</label
                    >
                    <input
                      type="number"
                      class="form-control"
                      placeholder="Enter Available Quantity"
                      v-model="form.available_quantity"
                    />
                    <small class="text-danger" v-if="errors.available_quantity">
                      {{ errors.available_quantity[0] }}
                    </small>
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <div class="custom-file">
                      <input
                        type="file"
                        class="custom-file-input"
                        id="inputGroupFile01"
                        @change="onFileSelected"
                      />
                      <label class="custom-file-label" for="inputGroupFile01"
                        >Upload Image</label
                      >
                      <small class="text-danger" v-if="errors.product_Image">
                        {{ errors.product_Image[0] }}
                      </small>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <img :src="form.newproduct_Image" style="height: 40px; width: 40px" />
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
        product_name:  "",
        product_description:  "",
        unit_price:  "",
        available_quantity:  "",
        product_image:  "",
        newproduct_Image: "",
      },
      errors: {},
    };
  },
  created() {
    let id = this.$route.params.id;
    axios
      .get("/api/product/" + id)
      .then(({ data }) => (this.form = data))
      .catch(console.log("error"));
  },

  methods: {
    onFileSelected(event) {
      let file = event.target.files[0];
      if (file.size > 1048770) {
        Notification.image_validation();
      } else {
        let reader = new FileReader();
        reader.onload = (event) => {
          this.form.newproduct_Image = event.target.result;
        };
        reader.readAsDataURL(file);
      }
    },
    productUpdate() {
      let id = this.$route.params.id;
      axios
        .patch("/api/product/" + id, this.form)
        .then(() => {
          this.$router.push({ name: "allProducts" });
          Notification.success();
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },
   
  },
};
</script>

<style scoped>
</style>