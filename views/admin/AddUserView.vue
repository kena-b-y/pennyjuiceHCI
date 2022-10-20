<template>
  <div class="col-lg-6 col-ml-12">
    <div class="row">
      <!-- basic form start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <h4 class="header-title">Add New User</h4>
            <form
              class="user"
              @submit.prevent="userdetailInsert"
              enctype="multipart/form-data"
            >
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-4">
                    <label for="example-text-input" class="col-form-label"
                      >First Name</label
                    >
                    <input
                      class="form-control"
                      type="text"
                      id="example-text-input"
                      placeholder="Enter First Name"
                      v-model="form.first_name"
                    />
                    <small class="text-danger" v-if="errors.first_name">
                      {{ errors.first_name[0] }}
                    </small>
                  </div>
                  <div class="col-md-4">
                    <label for="example-text-input" class="col-form-label"
                      >Last Name</label
                    >
                    <input
                      class="form-control"
                      type="text"
                      id="example-text-input"
                      placeholder="Enter Last Name"
                      v-model="form.last_name"
                    />
                    <small class="text-danger" v-if="errors.last_name">
                      {{ errors.last_name[0] }}
                    </small>
                  </div>
                  <div class="col-md-4">
                    <label for="example-text-input" class="col-form-label"
                      >User Name</label
                    >
                    <input
                      class="form-control"
                      type="text"
                      id="example-text-input"
                      placeholder="Enter Username"
                      v-model="form.name"
                    />
                    <small class="text-danger" v-if="errors.name">
                      {{ errors.name[0] }}
                    </small>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="exampleInputEmail1">Email address</label>
                    <input
                      type="email"
                      class="form-control"
                      id="exampleInputEmail1"
                      aria-describedby="emailHelp"
                      placeholder="Enter email"
                      v-model="form.email"
                    />
                    <small class="text-danger" v-if="errors.email">
                      {{ errors.email[0] }}
                    </small>
                  </div>
                  <div class="col-md-6">
                    <label for="example-text-input" class="col-form-label"
                      >Phone Number</label
                    >
                    <input
                      class="form-control"
                      type="tel"
                      id="example-text-input"
                      placeholder="Enter Phone Number"
                      v-model="form.phone_no"
                    />
                    <small class="text-danger" v-if="errors.phone_no">
                      {{ errors.phone_no[0] }}
                    </small>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="exampleInputPassword1">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="exampleInputPassword1"
                      placeholder="Password"
                      v-model="form.password"
                    />
                    <small class="text-danger" v-if="errors.password">
                      {{ errors.password[0] }}
                    </small>
                  </div>
                  <div class="col-md-6">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="exampleInputPassword1"
                      placeholder="Confirm Password"
                      v-model="form.password_confirmation"
                    />
                    <small
                      class="text-danger"
                      v-if="errors.password"
                    >
                      {{ errors.password[0] }}
                    </small>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="exampleInputEmail1">Address</label>
                    <input
                      class="form-control"
                      type="text"
                      id="example-text-input"
                      placeholder="Enter Your Address"
                      v-model="form.address"
                    />
                    <small class="text-danger" v-if="errors.address">
                      {{ errors.address[0] }}
                    </small>
                  </div>
                  <div class="col-md-6">
                    <label class="col-form-label">Role</label>
                    <select class="form-control" v-model="form.role">
                      <option :value="role.role_id" v-for="role in roles" :key="role.role_id">
                        {{ role.role_name }}
                      </option>
                    </select>
                    <small class="text-danger" v-if="errors.role">
                      {{ errors.role[0] }}
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
        name: null,
        email: null,
        address: null,
        phone_no: null,
        password: null,
        password_confirmation: null,
        photo: null,
        role: null,
      },
      errors: {},
      roles:{},
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
    userdetailInsert() {
      axios;
      axios
        .post("/api/userdetail", this.form)
        .then(() => {
          this.$router.push({ name: "allUsers" });
          Notification.success();
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },
  },
    created(){
    axios.get('/api/role/')
    .then(({data}) => (this.roles = data))
  } 

};
</script>

<style scoped>
</style>