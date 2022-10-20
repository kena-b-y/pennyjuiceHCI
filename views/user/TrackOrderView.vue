<template>
  <Nav />

  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Customer Name</th>
          <th>Order Status</th>
          <th>Amount</th>
          <th>View Order Details</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="order in filtersearch" :key="order.order_id">
          <td v-if="order.customer_id == customerid">{{ order.order_id }}</td>
          <td v-if="order.customer_id == customerid">{{ order.name }}</td>
          <td v-if="order.customer_id == customerid">
            Ksh.{{ order.order_amount }}
          </td>
          <td v-if="order.customer_id == customerid">
            <span
              class="status-p bg-primary"
              v-if="order.order_status == 'Processing'"
              >{{ order.order_status }}</span
            >
            <span
              class="status-p bg-danger"
              v-else-if="order.order_status == 'Cancelled'"
              >{{ order.order_status }}</span
            >
            <span
              class="status-p bg-success"
              v-else-if="order.order_status == 'Shipping'"
              >{{ order.order_status }}</span
            >
            <span
              class="status-p bg-success"
              v-else-if="order.order_status == 'Ready'"
              >{{ order.order_status }}</span
            >
            <span
              class="status-p bg-secondary"
              v-else-if="order.order_status == 'Delivered'"
              >{{ order.order_status }}</span
            >
          </td>
          <td v-if="order.customer_id == customerid">
            <router-link
              :to="{
                name: 'trackorderdetails',
                params: { id: order.order_id },
              }"
              class="text-secondary"
              ><i class="fa fa-eye"></i
            ></router-link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script type="text/javascript">
import Nav from "./Nav.vue";

export default {
  components: {
    Nav,
  },
  created() {
    if (!User.loggedIn()) {
      this.$router.push({ name: "login" });
    }
  },
  data() {
    return {
      orders: [],
      searchTerm: "",
    };
  },
  computed: {
    filtersearch() {
      return this.orders.filter((order) => {
        return order.name.match(this.searchTerm);
      });
    },
    customerid() {
      const userid = User.id();
      return userid;
    },
  },

  methods: {
    allOrder() {
      axios
        .get("/api/orders/")
        .then(({ data }) => (this.orders = data))
        .catch();
    },
  },
  created() {
    this.allOrder();
  },
};
</script>

<style scoped>
/*   color variables */
/*   border radius */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: "Rubik", sans-serif;
  height: 100vh;
  color: #4f546c;
  font-size: 0.9rem;
  background-color: #f9fbff;
}

.table-container {
  display: flex;
  justify-content: center;
  margin-top: 12rem;
}

table {
  font-size: large;
  border-collapse: collapse;
  box-shadow: 0 5px 10px #e1e5ee;
  background-color: white;
  text-align: center;
  overflow: hidden;
}

table thead {
  box-shadow: 0 5px 10px #e1e5ee;
}

table th {
  padding: 1rem 2rem;
  text-transform: uppercase;
  letter-spacing: 0.1rem;
  font-size: 1.7rem;
  font-weight: 900;
}
table td {
  padding: 1rem 2rem;
}
table a {
  text-decoration: none;
  color: #2962ff;
}
table .status {
  border-radius: 0.2rem;
  background-color: red;
  padding: 0.2rem 1rem;
  text-align: center;
}
table .status-processing {
  background-color: #fff0c2;
  color: #a68b00;
}
table .status-ready {
  background-color: #c8e6c9;
  color: #388e3c;
}

table .status-shipping {
  background-color: #c8e6c9;
  color: #388e3c;
}

table .status-cancelled {
  background-color: #ffcdd2;
  color: #c62828;
}
table .amount {
  text-align: right;
}
table tr:nth-child(even) {
  background-color: #f4f6fb;
}
</style>
