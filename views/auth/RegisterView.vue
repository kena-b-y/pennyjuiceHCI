<template>
    <!-- Register area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form @submit.prevent="signup">
                    <div class="login-form-head">
                        <h1>Sign up</h1>
                        <br>
                        <img src="../.././assets/admin/assets/images/icon/pennyjuice_logo.png" alt="">
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputName1">Username</label>
                            <input type="text" id="exampleInputName1" v-model="form.name" />
                            <i class="ti-user"></i>
                            <div class="text-danger" v-if="errors.name">{{ errors.name[0] }}</div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1"
                                >Email address</label
                            >
                            <input type="email" id="exampleInputEmail1" v-model="form.email" />
                            <i class="ti-email"></i>
                            <div class="text-danger" v-if="errors.email">{{ errors.email[0] }}</div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1" v-model="form.password" />
                            <i class="ti-lock"></i>
                            <div class="text-danger" v-if="errors.password">{{ errors.password[0] }}</div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword2"
                                >Confirm Password</label
                            >
                            <input type="password" id="exampleInputPassword2" v-model="form.password_confirmation" />
                            <i class="ti-lock"></i>
                            <div class="text-danger" v-if="errors.password">{{ errors.password[0] }}</div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">
                                Sign up <i class="ti-arrow-right"></i>
                            </button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">
                                Don't have an account?
                                <router-link to="/login">Sign in</router-link>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Register area end -->
</template>

<script type="text/javascript">
  
  export default {
    created(){
      if (User.loggedIn()) {
        this.$router.push({name: 'home'})
      }
    },

    data(){
    return {
      form:{
        name: null,
        email: null,
        password: null,
        confirm_password: null
      },
      errors:{}
    }
  }, 
  methods:{
    signup(){
      axios.post('/api/auth/signup',this.form)
      .then(res => {
        User.responseAfterLogin(res)
        Toast.fire({
          icon: 'success',
          title: 'Signed in successfully'
        })
        this.$router.push({ name: 'home'})
      })

       .catch(error =>this.errors = error.response.data.errors)
       
    }
  }


  } 
</script>
