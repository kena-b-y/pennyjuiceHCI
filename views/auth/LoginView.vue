<template>
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form @submit.prevent="login">
                    <div class="login-form-head">
                        <h1>Sign In</h1>
                        <br>
                        <img src="../.././assets/admin/assets/images/icon/pennyjuice_logo.png" alt="">
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1"
                                >Email address</label
                            >
                            <input
                                type="email"
                                id="exampleInputEmail1"
                                v-model="form.email"
                            />
                            <i class="ti-email"></i>
                            <div class="text-danger" v-if="errors.email">{{ errors.email[0] }}</div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input
                                type="password"
                                id="exampleInputPassword1"
                                v-model="form.password"
                            />
                            <i class="ti-lock"></i>
                            <div class="text-danger" v-if="errors.password">{{ errors.password[0] }}</div>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div
                                    class="custom-control custom-checkbox mr-sm-2"
                                >
                                    <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="customControlAutosizing"
                                    />
                                    <label
                                        class="custom-control-label"
                                        for="customControlAutosizing"
                                        >Remember Me</label
                                    >
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <router-link to="/forgotpassword"
                                    >Forgot Password?</router-link
                                >
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">
                                Log in <i class="ti-arrow-right"></i>
                            </button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">
                                Don't have an account?
                                <router-link to="/register"
                                    >Sign up</router-link
                                >
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
</template>

<script type="text/javascript">
export default {
    created() {
        if (User.loggedIn()) {
            this.$router.push({ name: "home" });
        }
    },

    data() {
        return {
            form: {
                email: null,
                password: null,
            },
            errors: {},
        };
    },
    methods: {
        login() {
            axios
                .post("/api/auth/login", this.form)
                .then((res) => {
                    User.responseAfterLogin(res);
                    Toast.fire({
                        icon: "success",
                        title: "Signed in successfully",
                    });
                    this.$router.push({ name: "home" });
                })

                .catch((error) => (this.errors = error.response.data.errors))
                .catch(
                    Toast.fire({
                        icon: "warning",
                        title: "Invalid Email or Password",
                    })
                );
        },
    },
};
</script>
