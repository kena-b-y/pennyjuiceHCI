<template>
  <!-- Progress Table start -->
  <div class="col-12 mt-5">
    <div class="card">
      <div class="card-body">
        <div>
          <div class="header-area header-bottom">
            <div class="container">
              <div class="row align-items-center">
                <h4 class="header-title">Roles Table</h4>
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
                  <th scope="col">Role ID</th>
                  <th scope="col">Role</th>
                  <th scope="col">action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="role in filtersearch" :key="role.role_id">
                  <td>{{ role.role_id }}</td>
                  <td>{{ role.role_name }}</td>
                  <td>
                    <ul class="d-flex justify-content-center">
                      <li class="mr-3">
                        <router-link
                          :to="{ name: 'editRole', params: { id: role.role_id } }"
                          class="text-secondary"
                          ><i class="fa fa-edit"></i
                        ></router-link>
                      </li>
                      <li>
                        <a @click="deleteRole(role.role_id)" class="text-danger"
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
      roles: [],
      searchTerm: "",
    };
  },
    computed:{
      filtersearch(){
      return this.roles.filter(role => {
         return role.role_name.match(this.searchTerm)
      }) 
      }
    },

  methods:{
    allRole(){
      axios.get('/api/role/')
      .then(({data}) => (this.roles = data))
      .catch()
    },
  deleteRole(id){
             Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete role!'
            }).then((result) => {
              if (result.value) {
                axios.delete('/api/role/'+id)
               .then(() => {
                this.roles = this.roles.filter(role => {
                  return role.role_id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'allRoles'})
               })
                Swal.fire(
                  'Deleted!',
                  'Role has been deleted.',
                  'success'
                )
              }
            })

  } 

  },
  created(){
    this.allRole();
  } 
};
</script>
