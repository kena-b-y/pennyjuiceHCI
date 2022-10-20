<template>
  <!-- header area start -->
  <div class="header-area header-bottom">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-9 d-none d-lg-block">
          <div class="horizontal-menu">
            <nav>
              <ul id="nav_menu">
                <li >
                  <router-link to="/dashboard"
                    ><i class="ti-dashboard"></i
                    ><span>dashboard</span></router-link
                  >
                </li>
                <li class="">
                  <router-link to=""
                    ><i class="ti-user"></i><span>Users</span></router-link
                  >
                  <ul class="submenu">
                    <li>
                      <router-link to="/all-users">All Users</router-link>
                    </li>
                    <li class="">
                      <router-link to="/add-user">Add User</router-link>
                    </li>
                    <li class="">
                      <router-link to="/all-roles">All Roles</router-link>
                    </li>
                    <li class="">
                      <router-link to="/add-role">Add Role</router-link>
                    </li>
                  </ul>
                </li>
                <li class="">
                  <router-link to=""
                    ><i class="ti-list"></i><span>Products</span></router-link
                  >
                  <ul class="submenu">
                    <li>
                      <router-link to="/all-products">All Products</router-link>
                    </li>
                    <li class="">
                      <router-link to="/add-product">Add Products</router-link>
                    </li>
                  </ul>
                </li>
                <li class="">
                  <router-link to="/all-orders"
                    ><i class="ti-list"></i
                    ><span>Orders</span></router-link
                  >
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- nav and search button -->
        <NavSearch />
        <!-- mobile_menu -->
        <MobileMenu />
      </div>
    </div>
  </div>
  <!-- header area end -->
</template>
<script>
import NavSearch from "./NavSearch.vue";
import MobileMenu from "./MobileMenu.vue";

export default {
  components: {
    NavSearch,
    MobileMenu,
  },
};
</script>
