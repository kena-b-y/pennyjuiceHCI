<template>
  <div class="col-lg-6 col-ml-12">
    <div class="row">
      <!-- basic form start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <h4 class="header-title">Add New Order</h4>
            <form
              class="user"
              @submit.prevent="userInsert"
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
                      v-model="form.first_name"
                    />
                    <small class="text-danger" v-if="errors.first_name">
                      {{ errors.first_name[0] }}
                    </small>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Product Description</label>
                <textarea
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="Enter Product Description"
                  v-model="form.email"
                />
                <small class="text-danger" v-if="errors.email">
                  {{ errors.email[0] }}
                </small>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="exampleInputPassword1">Unit Price</label>
                    <input
                      type="number"
                      class="form-control"
                      id="exampleInputPassword1"
                      placeholder="Enter Unit Price"
                      v-model="form.password"
                    />
                    <small class="text-danger" v-if="errors.password">
                      {{ errors.password[0] }}
                    </small>
                  </div>
                  <div class="col-md-6">
                    <label for="exampleInputPassword1">Available Quantity</label>
                    <input
                      type="number"
                      class="form-control"
                      id="exampleInputPassword1"
                      placeholder="Enter Available Quantity"
                      v-model="form.password_confirmation"
                    />
                    <small class="text-danger" v-if="errors.password_confirmation">
                      {{ errors.password_confirmation[0] }}
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
                      <small class="text-danger" v-if="errors.photo">
                        {{ errors.photo[0] }}
                      </small>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <img :src="form.photo" style="height: 40px; width: 40px" />
                </div>
              </div>
              <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">
                Submit
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
      this.$router.push({ name: "login" });
    }
  },

  data() {
    return {
      form: {
        first_name: null,
        last_name: null,
        email: null,
        password: null,
        password_confirmation: null,
        photo: null,
        role: null,
        gender: null,
      },
      errors: {},
    };
  },

  methods: {
    onFileSelected(event) {
      let file = event.target.files[0];
      if (file.size > 1048770) {
        Notification.image_validation();
      } else {
        let reader = new FileReader();
        reader.onload = (event) => {
          this.form.photo = event.target.result;
          console.log(event.target.result);
        };
        reader.readAsDataURL(file);
      }
    },
    userInsert() {
      axios
        .post("/api/user", this.form)
        .then(() => {
          this.$router.push({ name: "allUsers" });
          Notification.success();
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },
  },
};
</script>

<style scoped>
</style>