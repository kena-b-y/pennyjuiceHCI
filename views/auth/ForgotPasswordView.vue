<template>
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form>
                    <div class="login-form-head">
                        <h1>Reset Password</h1>
                        <br>
                        <img src="../.././assets/admin/assets/images/icon/pennyjuice_logo.png" alt="">
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1"
                                >Email address</label
                            >
                            <input type="email" id="exampleInputEmail1" />
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">
                                Submit Email <i class="ti-arrow-right"></i>
                            </button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">
                                <router-link to="/login"
                                    >Back to Sign In?</router-link
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

<script>
export default {
    name: "forgot-password'",
    components: {},
};
</script>
