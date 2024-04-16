<template>
  <div class="row row-cols-2 row-cols-md-4 g-2">
    <ProductItem
      v-for="product in products"
      :key="product.id"
      :product="product"
      @add-to-cart="$emit('add-to-cart', product)"
      class="products__item"
    />
  </div>
</template>

<script>
import ProductItem from './ProductItem';

export default {
  name: 'ProductsList',
  props: {
    products: {
      type: Array,
      default: () => [],
    },
  },
  components: {
    ProductItem,
  },
};
</script>
