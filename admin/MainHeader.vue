<template>
  <!-- main header area start -->
  <div class="mainheader-area">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-3">
          <div class="logo">
            <router-link to="/dashboard"
              ><img src="../.././assets/admin/assets/images/icon/pennyjuice_logo.png" alt="logo"
            /></router-link>
          </div>
        </div>
        <ProfileInfoTaskNotification />
      </div>
    </div>
  </div>
  <!-- main header area end -->
</template>

<script>
import ProfileInfoTaskNotification from "./ProfileInfoTaskNotification.vue";

export default {
    components: {
        ProfileInfoTaskNotification,
    },
};
</script>
