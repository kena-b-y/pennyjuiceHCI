//Auth
import LoginView from '../views/auth/LoginView.vue'
import RegisterView from '../views/auth/RegisterView.vue'
import ForgotPasswordView from '../views/auth/ForgotPasswordView.vue'
import LogoutView from '../views/auth/LogoutView.vue'
//admin
import DashboardView from '../views/admin/DashboardView.vue'
import AddUserView from '../views/admin/AddUserView.vue'
import AllUsersView from '../views/admin/UsersView.vue'
import EditUserView from '../views/admin/EditUserView.vue'
import AddRoleView from '../views/admin/AddRoleView.vue'
import AllRolesView from '../views/admin/RolesView.vue'
import EditRoleView from '../views/admin/EditRoleView.vue'
import AddProductView from '../views/admin/AddProductView.vue'
import AllProductsView from '../views/admin/ProductsView.vue'
import EditProductView from '../views/admin/EditProductView.vue'
import AddOrderView from '../views/admin/AddOrderView.vue'
import AllOrdersView from '../views/admin/OrdersView.vue'
import EditOrderView from '../views/admin/EditOrderView.vue'
import ViewOrderView from '../views/admin/ViewOrder.vue'



//User
import HomeView from '../views/user/HomeView.vue'
import ChildcareView from '../views/user/ChildcareView.vue'
import ProductsView from '../views/user/ProductsView.vue'
import CartView from '../views/user/CartView.vue'
import CheckoutView from '../views/user/CheckoutView.vue'
import TrackOrderView from '../views/user/TrackOrderView.vue'
import TrackOrderDetailsView from '../views/user/TrackOrderDetailsView.vue'


const routes = [
    // Auth
    {
      path: '/login',
      name: 'login',
      component: LoginView
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
    },
    {
      path: '/register',
      name: 'registration',
      component: RegisterView
    },
    {
      path: '/forgotpassword',
      name: 'forgot-password',
      component: ForgotPasswordView
    },
    {
      path: '/logout',
      name: 'logout',
      component: LogoutView
    },
// Admin
    {
      path: '/',
      name: 'dashboard',
      component: DashboardView
    },
    {
      path: '/add-user',
      name: 'addUser',
      component: AddUserView
    },
    {
      path: '/all-users',
      name: 'allUsers',
      component: AllUsersView
    },
    {
      path: '/edit-user',
      name: 'editUser',
      component: EditUserView
    },

    {
      path: '/add-role',
      name: 'addRole',
      component: AddRoleView
    },
    {
      path: '/all-roles',
      name: 'allRoles',
      component: AllRolesView
    },
    {
      path: '/edit-role',
      name: 'editRole',
      component: EditRoleView
    },
    {
      path: '/add-product',
      name: 'addProduct',
      component: AddProductView
    },
    {
      path: '/all-products',
      name: 'allProducts',
      component: AllProductsView
    },
    {
      path: '/edit-product',
      name: 'editProduct',
      component: EditProductView
    },
    {
      path: '/add-order',
      name: 'addOrder',
      component: AddOrderView
    },
    {
      path: '/all-orders',
      name: 'allOrders',
      component: AllOrdersView
    },
    {
      path: '/edit-order',
      name: 'editOrder',
      component: EditOrderView
    },
    {
      path: '/view-order',
      name: 'viewOrder',
      component: ViewOrderView
    },


//User
{
  path: '/home',
  name: 'home',
  component: HomeView
},
{
  path: '/childcare',
  name: 'childcare',
  component: ChildcareView
},
{
  path: '/products',
  name: 'products',
  component: ProductsView
},
{
  path: '/cart',
  name: 'cart',
  component: CartView
},
{
  path: '/checkout',
  name: 'checkout',
  component: CheckoutView
},
{
  path: '/trackorder',
  name: 'trackorder',
  component: TrackOrderView
},
{
  path: '/trackorderdetails',
  name: 'trackorderdetails',
  component: TrackOrderDetailsView
},


  ]

  export default routes
  