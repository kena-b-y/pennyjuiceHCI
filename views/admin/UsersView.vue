<template>
  <!-- Progress Table start -->
  <div class="col-12 mt-5">
    <div class="card">
      <div class="card-body">
        <div>
          <div class="header-area header-bottom">
            <div class="container">
              <div class="row align-items-center">
                <h4 class="header-title">Users' Details Table</h4>
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
                  <th scope="col">User ID</th>
                  <th scope="col">Username</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">email</th>
                  <th scope="col">Phone no.</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="userdetail in filtersearch"
                  :key="userdetail.userdetails_id"
                >
                  <td>{{ userdetail.userdetails_id }}</td>
                  <td>{{ userdetail.name }}</td>
                  <td>{{ userdetail.first_name }}</td>
                  <td>{{ userdetail.last_name }}</td>
                  <td>{{ userdetail.email }}</td>
                  <td>{{ userdetail.phone_no }}</td>
                  <td><img :src="userdetail.photo" id="em_photo" /></td>
                  <td>{{ userdetail.role }}</td>
                  <td>
                    <ul class="d-flex justify-content-center">
                      <li class="mr-3">
                        <router-link
                          :to="{
                            name: 'editUser',
                            params: { id: userdetail.userdetails_id },
                          }"
                          class="text-secondary"
                          ><i class="fa fa-edit"></i
                        ></router-link>
                      </li>
                      <li>
                        <a
                          @click="deleteUserdetail(userdetail.userdetails_id)"
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
      userdetails: [],
      searchTerm: "",
    };
  },
  computed: {
    filtersearch() {
      return this.userdetails.filter((userdetail) => {
        return userdetail.name.match(this.searchTerm);
      });
    },
  },

  methods: {
    allUserdetail() {
      axios
        .get("/api/userdetail/")
        .then(({ data }) => (this.userdetails = data))
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
        confirmButtonText: "Yes, delete User details!",
      }).then((result) => {
        if (result.value) {
          axios
            .delete("/api/userdetail/" + id)
            .then(() => {
              this.userdetails = this.userdetails.filter((userdetail) => {
                return userdetail.userdetails_id != id;
              });
            })
            .catch(() => {
              this.$router.push({ name: "allUsers" });
            });
          Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }
      });
    },
  },
  created() {
    this.allUserdetail();
  },
};
</script>


<style type="text/css">
#em_photo {
  height: 40px;
  width: 40px;
}
</style>