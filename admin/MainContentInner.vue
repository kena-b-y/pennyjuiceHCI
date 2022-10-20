<template>
  <div class="main-content-inner"   v-show="$route.path === '/login' || $route.path === '/register' || $route.path === '/forgotpassword' || $route.path === '/home' || $route.path === '/childcare' || $route.path === '/products' || $route.path === '/cart' || $route.path === '/checkout' || $route.path === '/trackorder' || $route.path === '/trackorderdetails'? false : true ">
    <div class="container">
      <div class="row">
        <router-view></router-view>
      </div>
    </div>
  </div>

  <div style="overflow:hidden;" v-show="$route.path === '/login' || $route.path === '/register' || $route.path === '/forgotpassword' || $route.path === '/home' || $route.path === '/childcare' || $route.path === '/products' || $route.path === '/cart' || $route.path === '/checkout' || $route.path === '/trackorder' || $route.path === '/trackorderdetails'? true : false ">
    <router-view></router-view>
  </div>
</template>





