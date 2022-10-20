<template>
  <div
    class="preview"
    data-target="{{ product.product_id}}"
    v-for="product in filtersearch"
    :key="product.product_id"
  >
    <i class="fas fa-times"></i>
    <img :src="product.product_image" alt="" />
    <h3>{{ product.product_name }}</h3>
    <div class="stars">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star-half-alt"></i>
      <span>( 250 )</span>
    </div>
    <p>Farm fresh {{ product.product_name }}</p>
    <div class="price">Ksh. {{ product.unit_price }}</div>
    <div class="buttons">
      <input type="number" min="1" placeholder="Quantity" />
      <router-link to="#" class="cart">Add to cart</router-link>
    </div>
  </div>
</template>