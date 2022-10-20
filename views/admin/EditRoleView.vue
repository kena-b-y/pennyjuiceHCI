<template>
  <div class="col-lg-6 col-ml-12">
    <div class="row">
      <!-- basic form start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <h4 class="header-title">Edit Role</h4>
            <form
              class="role"
              @submit.prevent="roleUpdate"
              enctype="multipart/form-data"
            >
              <div class="form-group">
                <label for="example-text-input" class="col-form-label"
                  >Role Name</label
                >
                <input
                  class="form-control"
                  type="text"
                  id="example-text-input"
                  placeholder="Enter Role"
                  v-model="form.role_name"
                />
                <small class="text-danger"></small>
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
      this.$router.push({ name: "login" });
    }
  },

    data(){
    return {
      form:{
        role_name: '',
      },
      errors:{}
    }
  },

  created(){
  	let id = this.$route.params.id
  	axios.get('/api/role/'+id)
  	.then(({data}) => (this.form = data))
  	.catch(console.log('error'))
  },

  methods:{

  roleUpdate(){
  	  let id = this.$route.params.id
       axios.patch('/api/role/'+id,this.form)
       .then(() => {
        this.$router.push({ name: 'allRoles'})
        Notification.success()
       })
       .catch(error =>this.errors = error.response.data.errors)
     },
  } 
}

</script>

<style scoped>
</style>