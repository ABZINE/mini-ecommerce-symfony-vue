<template>
  <div class="position-relative">
   <button @click="display=!display" type="button" class="btn btn-primary">
      My shopping cart <span class="badge bg-secondary">{{totalProducts}}</span>
    </button>
    <div v-show="products.length && display" class="products-cart bg-light border border-dark rounded p-4">
      <ul class="list-group mb-3">
        <li v-for="product in products" :key="product.id" class="list-group-item d-flex justify-content-between lh-sm">
          <div>
            <h6 class="my-0">{{ product.title }}</h6>
          </div>
          <small class="text-muted">{{ product.price }} x {{ product.quantity }}</small>
        </li>
      </ul>
      <p>Total: {{ totalPrice.toFixed(2) }}</p>
    </div>
  </div>
</template>

<script>
import { computed } from 'vue'
import { useStore } from 'vuex'

export default {
  data() {
    return {
      display: false,
    }
  },
  setup () {
    const store = useStore()

    const products = computed(() => store.getters['cart/cartProducts'])
    const totalPrice = computed(() => store.getters['cart/cartTotalPrice'])
    const totalProducts = computed(() => store.getters['cart/cartTotalProducts'])

    return {
      products,
      totalProducts,
      totalPrice
    }
  }
}
</script>

<style>
.products-cart{
  position: absolute;
  top:100%;
  right:0;
  z-index:100;
  width: 300px;
}
</style>