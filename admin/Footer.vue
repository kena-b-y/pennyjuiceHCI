<template>
    <!-- footer area start-->
    <footer>
        <div class="footer-area" id="footer" v-show="$route.path === '/login' || $route.path === '/register' || $route.path === '/forgotpassword' || $route.path === '/products' || $route.path === '/cart' || $route.path === '/checkout' || $route.path === '/trackorder' || $route.path === '/trackorderdetails'? false : true " style="display:  none;">
            <p>
                © Copyright 2022. All right reserved. Created by
                <a href="#">Penny Juice</a>.
            </p>
        </div>
    </footer>
    <!-- footer area end-->
</template>
