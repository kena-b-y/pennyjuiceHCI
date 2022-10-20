<template>
  <!-- main wrapper start -->
  <div class="horizontal-main-wrapper"  v-show="$route.path === '/login' || $route.path === '/register' || $route.path === '/forgotpassword' || $route.path === '/home' || $route.path === '/childcare' || $route.path === '/products' || $route.path === '/cart' || $route.path === '/checkout' || $route.path === '/trackorder' || $route.path === '/trackorderdetails'? false : true ">
    <!-- main header area start -->
    <MainHeader />
    <!-- main header area end -->
    <!-- header area start -->
    <Header />
    <!-- header area end -->
    <!-- main content area -->
    <MainContentInner />
    <!-- main content area end -->
    <!-- footer area start-->
    <Footer />
    <!-- footer area end-->
  </div>
  <!-- main wrapper end -->

    <div style="overflow:hidden;" v-show="$route.path === '/login' || $route.path === '/register' || $route.path === '/forgotpassword' || $route.path === '/home' || $route.path === '/childcare' || $route.path === '/products' || $route.path === '/cart' || $route.path === '/checkout' || $route.path === '/trackorder' || $route.path === '/trackorderdetails'? true : false ">
        <MainContentInner />
    </div>

</template>

<script>
import MainHeader from "./MainHeader.vue";
import Header from "./Header.vue";
import MainContentInner from "./MainContentInner.vue";
import Footer from "./Footer.vue";

export default {
    components: {
        MainHeader,
        Header,
        MainContentInner,
        Footer,
    },
};
</script>
