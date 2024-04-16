<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">Mini E-commerce Product Gallery</span>
      <ShoppingCart/>
    </div>
  </nav>
  <ProductsList
    :products="products"
    @add-to-cart="addProductToCart"
  />
</template>

<script>
import ProductsList from './components/ProductsList.vue'
import ShoppingCart from './components/ShoppingCart.vue'
import { computed } from 'vue'
import { useStore } from 'vuex'

export default {
  name: 'App',
  components: {
    ShoppingCart,
    ProductsList
  },
  setup () {
    const store = useStore()
    const products = computed(() => store.state.products.all)
    const addProductToCart = (product) => store.dispatch('cart/addProductToCart', product)
    store.dispatch('products/getAllProducts')

    return {
      addProductToCart,
      products
    }
  }
}
</script>